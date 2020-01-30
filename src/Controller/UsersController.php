<?php
namespace App\Controller;

use Cake\Controller\Controller;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends Admin\UsersController
{

    /**
     * ajaxdelaccount
     * 
     * @author doanphancongminh <minhdpc@gmail.com>
     * @date 08/16/2015
     * @access public
     * @version 1.0
     * @return (json) $return
     */
	public function ajaxdelaccount() {
		//Disable layout
    	$this->autoRender = FALSE;
    	$this->layout = FALSE;
    	$checkFlag = TRUE;
    	$isUpdate = TRUE;

    	if (!$this->request->is('ajax')) $this->redirect(Router::url('/', true));

    	$ajaxData = $this->request->data;
    	$return = array(
    			'e' => 1,
    			'm' => 'Server has been encountered for problem! Please try again in a few minute.',
    			'd' => array()
    	);
    	
    	if (empty($ajaxData['profileData'])) $checkFlag = FALSE;

    	$this->loadModel('posts');

    	if ($checkFlag) {
    		$this->posts->tempDelPost(base64_decode($ajaxData['profileData']));
    		$this->users->tempDelUsers(base64_decode($ajaxData['profileData']));
    		$return['e'] = 0;
    		$return['m'] = 'You had delete this account! You will be lougout.';
    	}

    	$return['d'] = $ajaxData;
    	exit(json_encode($return));
	}
}