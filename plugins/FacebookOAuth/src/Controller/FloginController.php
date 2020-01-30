<?php
namespace FacebookOAuth\Controller;

ob_clean();
session_start();

require_once ROOT . DS . 'plugins' . DS . 'FacebookOAuth' . DS . 'vendor' . DS . 'autoload.php';

use Facebook\Facebook;
use Facebook\Exceptions\FacebookSDKException;
use Facebook\Exceptions\FacebookResponseException;

/**
 * Flogin Controller
 *
 * @property \FacebookAuth\Model\Table\FloginTable $Flogin
 */
class FloginController extends AppController
{

	const FB_APP_ID      = '430983643753130';
	const FB_APP_SECRET  = '2fe0fc865796722a3ecd19e661fc642c';
	const FB_APP_VERSION = 'v2.4';
    const FB_APP_URL     = 'http://localhost:8888/dungnguyen/yourexchangeonline.com/facebookoauth/flogin/fbcallback';

	/**
	 * index
	 * @author minhdoanphancong <minhdpc@gmail.com>
	 * @date 09/15/2015
	 * @version 1.0
	 */
	public function index() {
		//Initialize facebook api
		$fbApi = new Facebook([
			'app_id'				=> self::FB_APP_ID,
			'app_secret'			=> self::FB_APP_SECRET,
			'default_graph_version'	=> self::FB_APP_VERSION
		]);
		$helperApi = $fbApi->getRedirectLoginHelper();
		$loginUrl = $helperApi->getLoginUrl(self::FB_APP_URL, array('scope' => 'email'));
		return $this->redirect($loginUrl);
	}

	/**
	 * fbcallback
	 * @author minhdoanphancong <minhdpc@gmail.com>
	 * @date 09/20/2015
	 * @version 1.4
	 */
	public function fbcallback() {
		//Initialize facebook api
		$fb = new Facebook([
			'app_id'				=> self::FB_APP_ID,
			'app_secret'			=> self::FB_APP_SECRET,
			'default_graph_version'	=> self::FB_APP_VERSION
		]);
		$helper = $fb->getRedirectLoginHelper();

		try {
			$accessToken = $helper->getAccessToken();
		} catch(Exceptions\FacebookResponseException $e) {
			// When Graph returns an error
			echo 'Graph returned an error: ' . $e->getMessage();
			exit;
		} catch(Exceptions\FacebookSDKException $e) {
			// When validation fails or other local issues
			echo 'Facebook SDK returned an error: ' . $e->getMessage();
			exit;
		}

		if (isset($accessToken)) {
			// Logged in!
			$fb->setDefaultAccessToken($accessToken);
			try {
				$response = $fb->get('/me?locale=en_US&fields=name,email,gender,age_range,picture,first_name,last_name,middle_name,birthday,hometown');
				$userNode = $response->getGraphUser();
                $userGroup = $response->getGraphGroup();
			} catch(Exceptions\FacebookResponseException $e) {
				// When Graph returns an error
				echo 'Graph returned an error: ' . $e->getMessage();
				exit;
			} catch(Exceptions\FacebookSDKException $e) {
				// When validation fails or other local issues
				echo 'Facebook SDK returned an error: ' . $e->getMessage();
				exit;
			}
			$this->loadComponent('GeoIP');
			$pictureUser = $userNode->getPicture()->asArray();
			$userNode = array(
				'type'			=> 0,
				'status'		=> 1,
				'password'		=> str_replace(' ', '', strtolower($userNode->getName())),
				'email'			=> $userGroup->getEmail(),
				'full_name'		=> $userNode->getName(),
				'gender'		=> $userNode->getGender(),
				'image'			=> $pictureUser['url'],
				'birthday'		=> $userNode->getBirthday(),
				'address'		=> $userNode->getHometown(),
				'city_id'		=> $this->GeoIP->getCityByIP('49.212.228.197'),
				'facebook'		=> 'https://www.facebook.com/' . $userNode->getId(),
			);
			// Now you can redirect to another page and use the
			$this->request->session()->write('fb_user', $userNode);
			$this->redirect('/users/register');
		}

	}
}
