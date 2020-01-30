<?php

namespace GoogleLogin\Controller;

//set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__ .'/vendor/google/apiclient/src');
require_once ROOT . '/vendor/autoload.php';
//require_once ROOT . '/vendor/google/apiclient/src/Google/autoload.php';

use Cake\Controller\Controller;
use Cake\ORM\TableRegistry;
use Cake\Core\App;
use Cake\Network\Request;
use Cake\Network\Response;

//google api
use Google_Client;
use Google_Service_Plus;
use Silex;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\SessionServiceProvider;

/**
 *
 * Dual-licensed under the GNU GPL v3 and the MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2015, DungNguyen (beautifullife @ GitHub)
 * @package       plugin
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 *                and/or GNU GPL v3 (http://www.gnu.org/copyleft/gpl.html)
 */ 

class GoogleLoginController extends Controller {
    
    /*
    *	@function 	
    *	@access		
    *	@date		
    * 	@return		
    */
    public function login() {
        //set layout
        $this->layout = 'ajax';        
        
        /**
         * Replace this with the client ID you got from the Google APIs console.
         */
        $clientId = '610544383140-jch9cbh5kfuqrohdono6f3rqcd8rn47c.apps.googleusercontent.com';
        
        /**
         * Replace this with the client secret you got from the Google APIs console.
         */
        $clientSecret = 'cJJR933eyO2NHUVpqkprwhSy';
            
        /**
         * Optionally replace this with your application's name.
         */
        $applicationName = "Google+ Login";
        
        $client = new Google_Client();
        $client->setApplicationName($applicationName);
        $client->setClientId($clientId);
        $client->setClientSecret($clientSecret);
        $client->setRedirectUri('postmessage');
        
        $plus = new Google_Service_Plus($client);
        
        $app = new Silex\Application();
        $app['debug'] = true;
        
        $app->register(new Silex\Provider\TwigServiceProvider(), array(
            'twig.path' => __DIR__,
        ));
        $app->register(new Silex\Provider\SessionServiceProvider());
        
        // Initialize a session for the current user, and render index.html.
        $app->get('/', function () use ($app) {             
            $state = md5(rand());
            $app['session']->set('state', $state);
            
            return $app['twig']->render('index.html', array(
                'CLIENT_ID' => $clientId,
                'STATE' => $state,
                'APPLICATION_NAME' => $applicationName
            ));
        });
     
        // Upgrade given auth code to token, and store it in the session.
        // POST body of request should be the authorization code.
        // Example URI: /connect?state=...&gplus_id=...
        $app->post('/connect', function (Request $request) use ($app, $client) {
            $token = $app['session']->get('token');
        
            if (empty($token)) {
                // Ensure that this is no request forgery going on, and that the user
                // sending us this connect request is the user that was supposed to.
                if ($request->get('state') != ($app['session']->get('state'))) {
                    return new Response('Invalid state parameter', 401);
                }
        
                // Normally the state would be a one-time use token, however in our
                // simple case, we want a user to be able to connect and disconnect
                // without reloading the page.  Thus, for demonstration, we don't
                // implement this best practice.
                //$app['session']->set('state', '');
        
                $code = $request->getContent();
                
                // Exchange the OAuth 2.0 authorization code for user credentials.
                $client->authenticate($code);
                $token = json_decode($client->getAccessToken());
        
                // You can read the Google user ID in the ID token.
                // "sub" represents the ID token subscriber which in our case
                // is the user ID. This sample does not use the user ID.
                $attributes = $client->verifyIdToken($token->id_token, $clientId)
                    ->getAttributes();
                $gplus_id = $attributes["payload"]["sub"];
        
                // Store the token in the session for later use.
                $app['session']->set('token', json_encode($token));
                $response = 'Successfully connected with token: ' . print_r($token, true);
            } else {
                $response = 'Already connected';
            }
        
            return new Response($response, 200);
        });
        
        // Get list of people user has shared with this app.
        $app->get('/people', function () use ($app, $client, $plus) {
            $token = $app['session']->get('token');
        
            if (empty($token)) {
                return new Response('Unauthorized request', 401);
            }
        
            $client->setAccessToken($token);
            $people = $plus->people->listPeople('me', 'visible', array());
        
            /*
             * Note (Gerwin Sturm):
             * $app->json($people) ignores the $people->items not returning this array
             * Probably needs to be fixed in the Client Library
             * items isn't listed as public property in Google_Service_Plus_Person
             * Using ->toSimpleObject for now to get a JSON-convertible object
             */
            return $app->json($people->toSimpleObject());
        });
        
        // Revoke current user's token and reset their session.
        $app->post('/disconnect', function () use ($app, $client) {
            $token = json_decode($app['session']->get('token'))->access_token;
            $client->revokeToken($token);
            // Remove the credentials from the user's session.
            $app['session']->set('token', '');
            return new Response('Successfully disconnected', 200);
        });
    
        $app->run();
    }
    
}