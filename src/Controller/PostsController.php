<?php
namespace App\Controller;

use Cake\Controller\Controller;

/**
 * Posts Controller
 *
 * @property \App\Model\Table\PostsTable $Posts
 */
class PostsController extends Admin\PostsController
{
	/**
	 * search
	 * 
	 * @author doanphancongminh <minhdpc@gmail.com>
	 * @version 1.2
	 * @data 08/11/2015
	 * @param string $cities
	 * @return Ambigous <void, \Cake\Network\Response>
	 */
	public function search() {
		//if not existed user, redirect to login page
		if (!$this->Auth->user()) {
			return $this->redirect(USER_LOGIN);
		}
		$searchCities = NULL;
		$searchPost = NULL;
		//Get Parameter
		if ($this->request->is('get')) {
			$dataRequest = $this->request->query;
			if (isset($dataRequest['city']) && is_numeric(base64_decode($dataRequest['city'], TRUE))) $searchCities = base64_decode($dataRequest['city']);
			if (isset($dataRequest['search'])) $searchPost = $dataRequest['search'];
		}

		//load new feeds (posts)
		$posts = $this->posts->getPosts($searchCities, $searchPost);

		//Set param
		$this->set(compact('posts'));
		$this->set('searchCities', $searchCities);
		$this->set('searchPost', $searchPost);
	
		$this->render('/Pages/home');
	}
}
