<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * ViewPost Controller
 *
 * @property \App\Model\Table\ViewPostTable $ViewPost
 */
class ViewPostController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Posts']
        ];
        $this->set('viewPost', $this->paginate($this->ViewPost));
        $this->set('_serialize', ['viewPost']);
    }

    /**
     * View method
     *
     * @param string|null $id View Post id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $viewPost = $this->ViewPost->get($id, [
            'contain' => ['Users', 'Posts']
        ]);
        $this->set('viewPost', $viewPost);
        $this->set('_serialize', ['viewPost']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $viewPost = $this->ViewPost->newEntity();
        if ($this->request->is('post')) {
            $viewPost = $this->ViewPost->patchEntity($viewPost, $this->request->data);
            if ($this->ViewPost->save($viewPost)) {
                $this->Flash->success(__('The view post has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The view post could not be saved. Please, try again.'));
            }
        }
        $users = $this->ViewPost->Users->find('list', ['limit' => 200]);
        $posts = $this->ViewPost->Posts->find('list', ['limit' => 200]);
        $this->set(compact('viewPost', 'users', 'posts'));
        $this->set('_serialize', ['viewPost']);
    }

    /**
     * Edit method
     *
     * @param string|null $id View Post id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $viewPost = $this->ViewPost->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $viewPost = $this->ViewPost->patchEntity($viewPost, $this->request->data);
            if ($this->ViewPost->save($viewPost)) {
                $this->Flash->success(__('The view post has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The view post could not be saved. Please, try again.'));
            }
        }
        $users = $this->ViewPost->Users->find('list', ['limit' => 200]);
        $posts = $this->ViewPost->Posts->find('list', ['limit' => 200]);
        $this->set(compact('viewPost', 'users', 'posts'));
        $this->set('_serialize', ['viewPost']);
    }

    /**
     * Delete method
     *
     * @param string|null $id View Post id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $viewPost = $this->ViewPost->get($id);
        if ($this->ViewPost->delete($viewPost)) {
            $this->Flash->success(__('The view post has been deleted.'));
        } else {
            $this->Flash->error(__('The view post could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
