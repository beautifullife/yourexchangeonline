<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * @return void
     */
    public function initialize()
    {
        $this->loadComponent('Flash');

        //validate
        $this->loadComponent('Auth',[
            'authorize' => 'controller',
            'authenticate' => [
                'form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ],
                ],
            ],
            'GoogleAuthenticate.Google' => [
            //'GoogleAuthenticator' => [
                'fields' => [
    			'username' => 'username',
    			'password' => 'password',
    			'code' => 'code',
    			'secret' => 'secret',
    		],
    		'userModel' => 'User',
    		'scope' => [],
            ],
            'loginAction' => [
                'controller' => 'users',
                'action' => 'login',
            ],
        ]);

        //page no need authenticate
        //user page
        $this->Auth->allow(['register','login','loginFacebook','loginGoogle','secret']);
        //admin page
        $this->Auth->allow(['admin']);
        //get user to arrangement layout
        $user = $this->Auth->user();

        //Initialize param
        $userItems = array();

        //Detect location of user by IP
        $geoIPLocation = $this->getCitiesByIP();
        //Get User item to trade or exchange
        $this->loadModel('posts');
        if (!empty($user['id'])) $userItems = $this->posts->getPostsByUserID($user['id']);
        //load Your Mind part
        $regions = $this->getCurrencyCode();
        //get user's messages
        $messageUser = $this->getMessageUser();
        $countMessages = $messageUser['count'];
        $messages = $messageUser['result'];

        //set params to view
        $this->set(compact('user','geoIPLocation', 'regions', 'messages', 'countMessages', 'userItems'));
    }

    /*
    *	@function
    *	@access
    *	@date
    * 	@return
    */
    public function isAuthorized() {
        return true;
    }

	/**
	 * getCitiesByIP
	 *
	 * @param unknown $ipAddress
	 * @return unknown
	 */
    private function getCitiesByIP() {
    	$cities = array();

    	//Load Component GeoIP
    	$this->loadComponent('GeoIP');
    	$countryCode = $this->GeoIP->getCountryByIP('114.12.12.15');//$this->request->clientIp());//$_SERVER['REMOTE_ADDR']

    	//Get data from regions and cities
    	$this->loadModel('cities');
    	$geoLocation = $this->cities->getCitiesByCountryCode($countryCode);
    	$cities = $geoLocation->toArray();

    	return $cities;
    }

    /**
     *	@function   getCurrencyCode
     * 	@author		Dung Nguyen - admin@saledream.com
     *	@access		private
     *	@params
     *	@date		1-July-2015
     * 	@return		object
     */
    private function getCurrencyCode() {
    	$model = $this->loadModel('regions');
    	$model->displayField('currency_code');

    	$regions = $model->getValidCurrencyCodeList();

    	//return
    	return $regions;
    }

    /**
    *	@function   getMessageUser
    * 	@author		Dung Nguyen - admin@saledream.com
    *	@access		public
    *	@params
    *	@date		11-Aug-2015
    * 	@return		object
    */
    private function getMessageUser() {
        $user = $this->Auth->user();
        //check user login
        if (!isset($user['id'])) {
            return false;
        }

        $model = $this->loadModel('messageUser');
        $messageUser = $model->getMessageUserByUserId($user['id']);

        return array(   'count'  => $messageUser->count(),
                        'result' => $messageUser->toArray(),
                        );
    }
}
