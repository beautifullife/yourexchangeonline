<?php
namespace GooglePlus\Controller;

/**
* GfriendsController
*/
class GfriendsController extends AppController {
	/* Initialize google api oauth constant */
	const CLIENT_ID = '838816967914-1vjcnpk6d906ha2rld0s5qcaemrvupug.apps.googleusercontent.com';
	const CLIENT_SECRET = 'R2arDcnQinvzYMwdrqtfQVbc';

	/* Initialize google api uri, max result and redirect uri */
	const REDIRECT_URI = 'http://yourexchangeonline.develop.minh.jp/googleplus/gfriends/friendEmail';
	const GOOGLE_OAUTH_URI = 'https://accounts.google.com/o/oauth2/token';
	const GOOGLE_CONTACT_URI = 'https://www.google.com/m8/feeds/contacts/default/full';
	const GOOGLE_MAX_RESULTS = 1000;

	public function index() {
	}

	public function friendEmail() {
		$this->layout = false;
		$codeGPlus = $this->request->query('code');
		if (!empty($codeGPlus)) {
			$fieldParam = array(
				'code'			=> $codeGPlus,
				'client_id'		=> self::CLIENT_ID,
				'client_secret'	=> self::CLIENT_SECRET,
				'redirect_uri'	=> self::REDIRECT_URI,
				'grant_type'	=> 'authorization_code'
			);
			//Initialize curl to get data from google api
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, self::GOOGLE_OAUTH_URI);
			curl_setopt($curl,CURLOPT_POST, 5);
			curl_setopt($curl,CURLOPT_POSTFIELDS, http_build_query($fieldParam));
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
			$result = curl_exec($curl);
			curl_close($curl);

			$response =  json_decode($result);
			$accesstoken = $response->access_token;
			$url = 'https://www.google.com/m8/feeds/contacts/default/full?max-results='.self::GOOGLE_MAX_RESULTS.'&oauth_token='.$accesstoken;
			$xmlresponse =  $this->curl_file_get_contents($url);
			if((strlen(stristr($xmlresponse,'Authorization required'))>0) && (strlen(stristr($xmlresponse,'Error '))>0)) //At times you get Authorization error from Google.
			{
				echo "<h2>OOPS !! Something went wrong. Please try reloading the page.</h2>";
				exit();
			}
			//$this->loadComponent('RequestHandler');
			//$this->RequestHandler->respondAs('xml');
			$xml =  simplexml_load_string($xmlresponse);
			$xml->registerXPathNamespace('gd', 'http://schemas.google.com/g/2005');
			$result = $xml->xpath('//gd:email');
			$sessionGEmail = array();
			foreach ($result as $title) {
				$gTitle = json_decode(json_encode($title), TRUE);
				$sessionGEmail[] = $gTitle['@attributes']['address'];
			}
			$this->request->session()->write('sessionGEmail', $sessionGEmail);
		}
	}

	public function getSessionData() {
		$this->layout = false;
		if (!$this->request->is('ajax')) return FALSE;
		$sessionGMail = $this->request->session()->read('sessionGEmail');
		if (!empty($sessionGMail)) {
			echo json_encode($sessionGMail);
			exit();
		}
	}

	private function curl_file_get_contents($url) {
		$curl = curl_init();
		$userAgent = $_SERVER['HTTP_USER_AGENT'];

		curl_setopt($curl,CURLOPT_URL,$url);	//The URL to fetch. This can also be set when initializing a session with curl_init().
		curl_setopt($curl,CURLOPT_RETURNTRANSFER,TRUE);	//TRUE to return the transfer as a string of the return value of curl_exec() instead of outputting it out directly.
		curl_setopt($curl,CURLOPT_CONNECTTIMEOUT,5);	//The number of seconds to wait while trying to connect.

		curl_setopt($curl, CURLOPT_USERAGENT, $userAgent);	//The contents of the "User-Agent: " header to be used in a HTTP request.
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);	//To follow any "Location: " header that the server sends as part of the HTTP header.
		curl_setopt($curl, CURLOPT_AUTOREFERER, TRUE);	//To automatically set the Referer: field in requests where it follows a Location: redirect.
		curl_setopt($curl, CURLOPT_TIMEOUT, 10);	//The maximum number of seconds to allow cURL functions to execute.
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);	//To stop cURL from verifying the peer's certificate.

		$contents = curl_exec($curl);
		curl_close($curl);
		return $contents;
	}
}
