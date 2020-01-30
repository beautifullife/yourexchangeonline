<?php
namespace App\Controller;

use Cake\Controller\Controller;

/**
 * Users Controller
 *
 * @property \App\Model\Table\ExchangesTable $Exchanges
 */
class ExchangesController extends Admin\ExchangesController
{    
    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function addAjax()
    {
        $this->layout = 'ajax';
        $this->render('ajax');
        
        $fid = base64_decode($this->request->data['fid']);
        $tid = base64_decode($this->request->data['tid']);
        
        //check valid params
        if (!is_numeric($fid) || !is_numeric($fid)) {
            echo 'invalid1';
            return;
        }
        //check the same id
        if ($fid == $tid) {
            echo 'invalid2';
            return;
        }
        //check exist exchange
        if ($this->Exchanges->checkExist($fid,$tid)) {
            echo 'existed';
            return;
        }
        //user can not exchange themselve items
        $userId = $this->Auth->user()['id'];
        $postModel = $this->loadModel('Posts');
        if ($postModel->checkUserPost($tid,$userId)) {
            echo 'invalid3';
            return;
        }
            
        $exchange = $this->Exchanges->newEntity();
        if ($this->request->is('post')) {
            //decode from_id, to_id
            $exchange = $this->Exchanges->patchEntity($exchange, $this->request->data);
            $exchange->set('from_post_id', $fid);
            $exchange->set('to_post_id', $tid);
            //save data
            $exchange->set('status',0);
            if ($this->Exchanges->save($exchange)) {
                echo 'success';
                return;
            }
        }
        echo 'fail';
        return;
    }
    
    /**
    *	@function   exchangeGraphAjax - get daa for exchange graph
    * 	@author		Dung Nguyen - admin@saledream.com	
    *	@access		public	
    *	@params		
    *	@date		18-Sep-2015
    * 	@return		json
    */
    public function exchangeGraphAjax()
    {
        $this->layout = 'ajax';
        $this->render('ajax');
        
        //get data
        $postModel = $this->loadModel('posts');
        $posts = $postModel->find('all', ['fields' => 'id'])->where('user_id = ' . $this->Auth->user()['id']);
        if (!$this->request->is('post') || $posts->count() <= 0) {
            //default empty
            echo json_encode(array('content' => '[{key: "", count: 0}]'));;
        }
        $postId = array();
        foreach ($posts->toArray() as $val) {
            $postId[] = $val->id;
        }
        //get data
        $exchange = $this->Exchanges->find('all')->where(' status IN (1,2) AND (from_post_id in ( ' . implode(',', $postId) . ' ) '
                                                        . ' OR to_post_id in ( ' . implode(',', $postId) .' ) )');     
        if ($exchange->count() <= 0) {
            
        }
        //process data
        $exchange = $exchange->toArray();               
        $exchangeArr = array();
        foreach ($exchange as $key => $val) {
            //debug($val);
            $key = date('Y-m-d',strtotime($val['created']));
            if (array_key_exists($key,$exchangeArr) === false) {
                $exchangeArr[$key] = array( 'key'   => $key,
                                            'count' => 1,
                                        );            
            } else {
                $exchangeArr[$key]['count']++;
            }
        }     
        
        //prepair data for Morris.js 
        foreach ($exchangeArr as $val) {
            $strArr[] = json_encode($val);
        }
        echo json_encode(array('content' => '[' . implode(',', $strArr) . ']' ) );
    }
}