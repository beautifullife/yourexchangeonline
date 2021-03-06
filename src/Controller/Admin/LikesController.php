<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Likes Controller
 *
 * @property \App\Model\Table\LikesTable $Likes
 */
class LikesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Posts', 'Users']
        ];
        $this->set('likes', $this->paginate($this->Likes));
        $this->set('_serialize', ['likes']);
    }

    /**
     * View method
     *
     * @param string|null $id Like id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $like = $this->Likes->get($id, [
            'contain' => ['Posts', 'Users']
        ]);
        $this->set('like', $like);
        $this->set('_serialize', ['like']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $like = $this->Likes->newEntity();
        if ($this->request->is('post')) {
            $like = $this->Likes->patchEntity($like, $this->request->data);
            if ($this->Likes->save($like)) {
                $this->Flash->success(__('The like has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The like could not be saved. Please, try again.'));
            }
        }
        $posts = $this->Likes->Posts->find('list', ['limit' => 200]);
        $users = $this->Likes->Users->find('list', ['limit' => 200]);
        $this->set(compact('like', 'posts', 'users'));
        $this->set('_serialize', ['like']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Like id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $like = $this->Likes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $like = $this->Likes->patchEntity($like, $this->request->data);
            if ($this->Likes->save($like)) {
                $this->Flash->success(__('The like has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The like could not be saved. Please, try again.'));
            }
        }
        $posts = $this->Likes->Posts->find('list', ['limit' => 200]);
        $users = $this->Likes->Users->find('list', ['limit' => 200]);
        $this->set(compact('like', 'posts', 'users'));
        $this->set('_serialize', ['like']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Like id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $like = $this->Likes->get($id);
        if ($this->Likes->delete($like)) {
            $this->Flash->success(__('The like has been deleted.'));
        } else {
            $this->Flash->error(__('The like could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
