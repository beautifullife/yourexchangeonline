<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * CommentLike Controller
 *
 * @property \App\Model\Table\CommentLikeTable $CommentLike
 */
class CommentLikeController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Comments', 'Users']
        ];
        $this->set('commentLike', $this->paginate($this->CommentLike));
        $this->set('_serialize', ['commentLike']);
    }

    /**
     * View method
     *
     * @param string|null $id Comment Like id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $commentLike = $this->CommentLike->get($id, [
            'contain' => ['Comments', 'Users']
        ]);
        $this->set('commentLike', $commentLike);
        $this->set('_serialize', ['commentLike']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $commentLike = $this->CommentLike->newEntity();
        if ($this->request->is('post')) {
            $commentLike = $this->CommentLike->patchEntity($commentLike, $this->request->data);
            if ($this->CommentLike->save($commentLike)) {
                $this->Flash->success(__('The comment like has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The comment like could not be saved. Please, try again.'));
            }
        }
        $comments = $this->CommentLike->Comments->find('list', ['limit' => 200]);
        $users = $this->CommentLike->Users->find('list', ['limit' => 200]);
        $this->set(compact('commentLike', 'comments', 'users'));
        $this->set('_serialize', ['commentLike']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Comment Like id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $commentLike = $this->CommentLike->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $commentLike = $this->CommentLike->patchEntity($commentLike, $this->request->data);
            if ($this->CommentLike->save($commentLike)) {
                $this->Flash->success(__('The comment like has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The comment like could not be saved. Please, try again.'));
            }
        }
        $comments = $this->CommentLike->Comments->find('list', ['limit' => 200]);
        $users = $this->CommentLike->Users->find('list', ['limit' => 200]);
        $this->set(compact('commentLike', 'comments', 'users'));
        $this->set('_serialize', ['commentLike']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Comment Like id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $commentLike = $this->CommentLike->get($id);
        if ($this->CommentLike->delete($commentLike)) {
            $this->Flash->success(__('The comment like has been deleted.'));
        } else {
            $this->Flash->error(__('The comment like could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
