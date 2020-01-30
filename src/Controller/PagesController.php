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

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

use Cake\Utility\Text;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{
    //helper
    public $helpers = ['AjaxMultiUpload.Upload'];

    /**
     * Displays a view
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public function display()
    {
        $path = func_get_args();

        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }

        //load new feeds (posts)
        $this->loadModel('posts');
        $posts = $this->posts->getPosts();     
        //get user posts for exchange
        $userPosts = $this->posts->getPostsByUserID($this->Auth->user()['id'], 'list', 'content');

        $tmpArr = $userPosts->toArray();
        //process long text
        $postArr = array();
        foreach ($tmpArr as $key=>$val) {
            $postArr[base64_encode($key)] = Text::truncate($val, 20, [
                'ellipsis'  => '...',
                'exact'     => false,
                'html'      => true,
            ]);
        }
        unset($tmpArr);

        //set params to view
        $this->set(compact('page', 'subpage', 'posts', 'postArr'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }
    }

    private function validBase64($string){
    	$decoded = base64_decode($str, true);
    	// Check if there is no invalid character in strin
    	if (!preg_match('/^[a-zA-Z0-9\/\r\n+]*={0,2}$/', $string)) return false;
    
    	// Decode the string in strict mode and send the responce
    	if(!base64_decode($string, true)) return false;
    
    	// Encode and compare it to origional one
    	if(base64_encode($decoded) != $string) return false;
    
    	return true;
    }
}
