<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;

use ReCaptcha\Controller\ReCaptchaController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    //helper
    public $helpers = ['AjaxMultiUpload.Upload'];

    /*
    *	@function
    *	@access
    *	@date
    * 	@return
    */
    public function initialize() {
        parent::initialize();
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Cities']
        ];
        $this->set('users', $this->paginate($this->Users));
        $this->set('_serialize', ['users']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {            
            $user = $this->Users->patchEntity($user, $this->request->data);

            if ($this->Users->save($user)) {
                $this->Flash->success('The user has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The user could not be saved. Please, try again.');
            }
        }
        //regions
        //get others table
        $regionsTable = TableRegistry::get('regions');
        $regions = $regionsTable->find('list', ['limit' => 300])->select(['id','country']);

        //cities
        $cities = $this->Users->Cities->find('list', ['limit' => 200]);

        //assign params to template
        $this->set(compact('user', 'cities', 'regions'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success('The user has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The user could not be saved. Please, try again.');
            }
        }
        $cities = $this->Users->Cities->find('list', ['limit' => 200]);
        //load counties
        $this->loadModel('Cities');
        $regions = $this->Cities->regions->find('list', ['limit' => 200]);

        //set to template
        $this->set(compact('user', 'cities', 'regions'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success('The user has been deleted.');
        } else {
            $this->Flash->error('The user could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

    /**
    * function
    * author	admin@sheetmusic4you.net
    * return
    * date
    */
    public function login() {
        //if user existed, go to profile page
        if ($this->Auth->user()) {
            return $this->redirect(USER_PROFILE);
        }

        //else process login
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            //login success
            if ($user) {
                //set user to session
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            //login fail
            $this->Flash->error(__('Your email or password is wrong, pls try again'));
        }
    }

    /*
    *	@function
    *	@access
    *	@date
    * 	@return
    */
    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    /*  can sign up via facebook, google+
    *	@function
    *	@access
    *	@date
    * 	@return
    */
    public function register() {
        //get user
        $user = $this->Auth->user();
        //if existed user -> redirect to previous page
        if ($user) {
            return $this->redirect($this->Auth->redirectUrl());
        }
        $userFbSession = $this->request->session()->read('fb_user');
        if (!empty($userFbSession)) {
        	$flagCheck = FALSE;
            $this->loadModel('Cities');
            //Get City ID
            $userFbSession['city_id'] = $this->Cities->getCitiesIDByName($userFbSession['city_id']);
            //Set user to entity
            $userSignUp = $this->Users->newEntity($userFbSession);
            if ($this->Users->save($userSignUp)) {
            	$flagCheck = TRUE;
            } else {
            	$userSignUp = $this->Users->findUserByEmail($userSignUp['email']);
            	$flagCheck = TRUE;
            }

            if ($flagCheck) {
            	$this->Auth->setUser($userSignUp->toArray());
            	$this->request->session()->delete('fb_user');
            	return $this->redirect($this->Auth->redirectUrl());
            }
            
        }
        //else, register this user
        else {
            if ($this->request->is('post')) {                
                //check captcha
                $verifyRecaptcha = ReCaptchaController::verify();
                if ($verifyRecaptcha) {
                    //$user = $this->Users->newEntity();
//                    $user = $this->Users->patchEntity($user, $this->request->data);
//        
//                    if ($this->Users->save($user)) {
//                        $this->Flash->success('The user has been saved.');
//                        return $this->redirect(['action' => 'index']);
//                    } else {
//                        $this->Flash->error('The user could not be saved. Please, try again.');
//                    }                
                }
                
            }
        }
    }

    /*
    *	@function
    *	@access
    *	@date
    * 	@return
    */
    public function profile() {
        //if not existed user, redirect to login page
        if (!$this->Auth->user()) {
            return $this->redirect(USER_LOGIN);
        }

        //else, get profile of this user
        $users = $this->Users->get($this->Auth->user()['id']);

        //Initialize Model Cities
        $this->loadModel('cities');
        $this->loadModel('regions');
        $citiesName = $this->cities->getCitiesNameByID($users->city_id);
        $regionsName = $this->regions->getRegionByID($citiesName->region_id);

        //set params to view
        $this->set('users', $users);
        $this->set('citiesName', $citiesName);
        $this->set('regionsName', $regionsName);
    }
    
    /**
    *	@function   profileByUser
    * 	@author		Dung Nguyen - admin@saledream.com	
    *	@access		public	
    *	@params		
    *	@date		7-Aug-2015
    * 	@return		void
    */
    public function profileByUser() {
        $params = $_GET['params'];
        
        if (!isset($params) || is_null($params)) {
            //if not provide user_id, return home page
            return $this->redirect('/');
        }
        
        //check existed this user
        if (!$this->Users->exists(['id'=>$params])) {
            $this->Flash->error(__('This user is not exist!'));
            //if not provide user_id, return home page
            return $this->redirect('/');
        }
        
        $users = $this->Users->get($params);

        //Initialize Model Cities
        $this->loadModel('cities');
        $this->loadModel('regions');
        $citiesName = $this->cities->getCitiesNameByID($users->city_id);
        $regionsName = $this->regions->getRegionByID($citiesName->region_id);

        //set params to view
        $this->set('users', $users);
        $this->set('citiesName', $citiesName);
        $this->set('regionsName', $regionsName);
        
        //render layout
        $this->render('profile');
    }

    /**
     * ajaxlocation
     *
     * @author doanphancongminh <minhdpc@gmail.com>
     * @date 08/05/2015
     * @access public
     * @version 1.1
     * @return (json) $return
     */
    public function ajaxlocation() {
    	//Disable layout
    	$this->autoRender = FALSE;
    	$this->layout = FALSE;

    	if (!$this->request->is('ajax')) $this->redirect(Router::url('/', true));

    	$ajaxData = $this->request->data;

    	$return = array(
    		'e' => 0,
    		'm' => 'Server has been encountered for problem! Please try again in a few minute.',
    		'd' => array()
    	);

    	$checkFlag = TRUE;
    	if (empty($ajaxData['type']) && empty($ajaxData['pdata'])) $checkFlag = FALSE;
    	if ($ajaxData['type'] !== 'country' || $ajaxData !== 'city') $checkFlag = FALSE;

    	if ($checkFlag = TRUE) {
    		$return['m'] = 'You have pull item successful!';

    		//Initialize Model
    		$this->loadModel('regions');
    		$this->loadModel('cities');
    		if ($ajaxData['type'] === 'country') {
    			$regions = $this->regions->getAllRegions();
    			foreach ($regions as $valueRegions) {
    				$return['d'][$valueRegions->id] = $valueRegions->country;
    			}
    		} else {
    			$cities = $this->cities->getCitiesNameByRegionID($ajaxData['pdata']);
    			foreach ($cities as $valueCities) {
    				$return['d'][$valueCities->id] = $valueCities->name;
    			}
    		}
    	}
        echo json_encode($return, JSON_UNESCAPED_UNICODE);
    	exit();
    }

    /**
     * ajaxprofile
     *
     * @author doanphancongminh <minhdpc@gmail.com>
     * @date 08/06/2015
     * @access public
     * @version 1.0
     * @return (json) $return
     */
    public function ajaxprofile() {
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
    	if (!isset($ajaxData['profileData'])) $checkFlag = FALSE;

    	$this->loadModel('users');

    	$jsonData = json_decode($ajaxData['profileData'], TRUE);

    	if ($ajaxData['type'] === 'check') $isUpdate = FALSE;

    	if (!empty($jsonData['old_pass'])) {
    		$userData = $this->users->getUserByID($this->Auth->user()['id']);
    		$checkUser = (new DefaultPasswordHasher)->check(base64_decode($jsonData['old_pass']), $userData->password);
    		if (!$checkUser) {
    			$return['e'] = 1;
    			$return['m'] = 'Old Password does not match! Please try again';
    			$checkFlag = FALSE;
    		}
    	}

		if ($checkFlag && $isUpdate) {

			if (!empty($jsonData['cityIns'])) {
				$jsonData['city_id'] = $jsonData['cityIns'];
			}
			
			if (!empty($jsonData['new_pass'])) {
				$jsonData['password'] = base64_decode($jsonData['new_pass']);
			}

			unset($jsonData['cityIns'], $jsonData['new_pass'], $jsonData['old_pass']);
            if (!empty($jsonData['birthday'])) $jsonData['birthday'] = date('Y-m-d', strtotime($jsonData['birthday']));
			$return['m'] = 'Update User Profile Successfully!';
	        $transaction = ConnectionManager::get('default');
	        $transaction->begin();
	        try {
	    	   $this->users->updateUser($this->Auth->user()['id'], $jsonData);
	           $transaction->commit();
	        } catch (Exception $e) {
	        	$return['e'] = 1;
	            $return['m'] = 'Update User Profile Failed!';
	            $transaction->rollback();
	        }
		} else {
			$return['e'] = 99;
		}

    	echo json_encode($return);
    	exit();
    }
}
