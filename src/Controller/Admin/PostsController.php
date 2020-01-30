<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
//transaction
use Cake\DataSource\ConnectionManager;

//upload images ajax
use AjaxMultiUpload\Controller\UploadsController;

/**
 * Posts Controller
 *
 * @property \App\Model\Table\PostsTable $Posts
 */
class PostsController extends AppController
{
    public $components = array('RequestHandler');

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $this->set('posts', $this->paginate($this->Posts));
        $this->set('_serialize', ['posts']);
    }

    /**
     * View method
     *
     * @param string|null $id Post id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => ['Users', 'Comments', 'ImagePost', 'Likes', 'RatingPost', 'ViewPost']
        ]);
        $this->set('post', $post);
        $this->set('_serialize', ['post']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $post = $this->Posts->newEntity();
        if ($this->request->is('post')) {
            $post = $this->Posts->patchEntity($post, $this->request->data);
            
            $user = $this->Auth->user();
            if (!isset($user['id'])) {
                //redirect to login page
                $this->redirect(['controller' => 'Users', 'action' => 'login']);
            }
            $post->set('user_id', $user['id']);
            $post->set('status', 1);
            
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The post could not be saved. Please, try again.'));
            }
        }
        $users = $this->Posts->Users->find('list', ['limit' => 200]);
        $this->set(compact('post', 'users'));
        $this->set('_serialize', ['post']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Post id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $post = $this->Posts->patchEntity($post, $this->request->data);
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The post could not be saved. Please, try again.'));
            }
        }
        $users = $this->Posts->Users->find('list', ['limit' => 200]);
        $this->set(compact('post', 'users'));
        $this->set('_serialize', ['post']);
    }

    /** Delete method
     * @function delete
     * @param   string|null $id Post id.
     * @return  void Redirects to index.
     * @throws  \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $post = $this->Posts->get($id);
        if ($this->Posts->delete($post)) {
            $this->Flash->success(__('The post has been deleted.'));
        } else {
            $this->Flash->error(__('The post could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
    /**
    * @function	publishJson
    * @author:  Dung Nguyen - admin@saledream.com  
    * @return	json
    * @date     5-Aug-2015		
    */
    public function publishJson() {
        //set layout
        $this->layout = 'ajax';
        
        //define params
        $resultArr = array('save_status' => 'fail');
        $fields = array('content','price','wishlists','tags','currency');
        $params = array();
        $lastId = null;
        
        if ($this->request->is('post')) {
            //get params
            foreach ($fields as $value) {
                if (isset($this->request->data[$value])) {
                    $params[$value] = $this->request->data[$value];
                }
            }
            //save into DB
            $post = $this->Posts->newEntity();  
                      
            //set user id for this post
            $user = $this->Auth->user();            
            if (!isset($user['id'])) {
                //redirect to login page
                $this->redirect(['controller' => 'Users', 'action' => 'login']);
            }

            $post = $this->Posts->patchEntity($post, $this->request->data);   
            $post->set('user_id', $user['id']);
            $post->set('status', 1);           
 
            if($lastId = $this->Posts->save($post)) {
                $resultArr['save_status'] = 'success';
            }
        }
        
        $resultArr['post_id'] = $lastId;
        
        //set main content to display
        $this->set(compact('posts','user'));
        
        $resultArr['main_content'] = json_encode($this->render('new_feed_ajax', 'ajax'));
                
        echo json_encode($resultArr);
    }
    
    /**
    * @function	publishHtml
    * @author   Dung Nguyen - admin@saledream.com 
    * @params   
    * @return	string | void
    * @date		5-Aug-2015
    */
    public function publishHtml() {
        //check SOAP method
        if (!$this->request->is('post')) return false;

        //save into DB
        $post = $this->Posts->newEntity();  
                  
        //set user id for this post
        $user = $this->Auth->user();            
        if (!isset($user['id'])) {
            //redirect to login page
            $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }

        $post = $this->Posts->patchEntity($post, $this->request->data);   
        $post->set('user_id', $user['id']);
        $post->set('status', 1);           

        if($lastId = $this->Posts->save($post)) {
            //perform after save success
        } else {
            //fail
            return 'fail';
        }
        
        //start transaction
        $transaction = ConnectionManager::get('default');
        $transaction->begin();
        
        //upload images
        if (self::callUploadImages($lastId->id) === false) {
            //rollback transaction
            $transaction->rollback();
            //delete image - patch check & delete (future)
        }
        
        //commit transaction
        $transaction->commit();
        
        //redirect to homepage
        $this->redirect('/');
    }
    
    /**
    *	@function 	callUploadImages
    *   @author     Dung Nguyen - admin@saledream.com 
    *	@access		private
    *   @params     integer
    *	@date		5-Aug-2015
    * 	@return		boolean
    */
    private function callUploadImages($postId) {
        $uploadsController = new UploadsController();
        $result = $uploadsController->uploadPostImages($postId);     
           
        //update images + image_post
        $imagesModel = $this->loadModel('Images'); 
        $imagePostModel = $this->loadModel('ImagePost');
                
        if (isset($result['imageArr'])) {
            foreach ($result['imageArr'] as $val) {
                //set data
                $images = $imagesModel->newEntity();
                $images->set('path', $val);
                //save data
                if ($lastId = $imagesModel->save($images)) {
                    //do somethings after success
                } else {
                    //do somethings after fail
                }
                              
                //update image_post
                $imagePost = $imagePostModel->newEntity();
                $imagePost->set('image_id', $lastId->id);
                $imagePost->set('post_id', $postId);
                //save data
                if ($imagePostModel->save($imagePost)) {
                    //do somethings after success
                } else {
                    //do somethings after fail                    
                }
            }
        }
        
        return true;
    }
}
