<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * ImageUser Controller
 *
 * @property \App\Model\Table\ImageUserTable $ImageUser
 */
class ImageUserController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Images', 'Users']
        ];
        $this->set('imageUser', $this->paginate($this->ImageUser));
        $this->set('_serialize', ['imageUser']);
    }

    /**
     * View method
     *
     * @param string|null $id Image User id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $imageUser = $this->ImageUser->get($id, [
            'contain' => ['Images', 'Users']
        ]);
        $this->set('imageUser', $imageUser);
        $this->set('_serialize', ['imageUser']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $imageUser = $this->ImageUser->newEntity();
        if ($this->request->is('post')) {
            $imageUser = $this->ImageUser->patchEntity($imageUser, $this->request->data);
            if ($this->ImageUser->save($imageUser)) {
                $this->Flash->success(__('The image user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The image user could not be saved. Please, try again.'));
            }
        }
        $images = $this->ImageUser->Images->find('list', ['limit' => 200]);
        $users = $this->ImageUser->Users->find('list', ['limit' => 200]);
        $this->set(compact('imageUser', 'images', 'users'));
        $this->set('_serialize', ['imageUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Image User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $imageUser = $this->ImageUser->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $imageUser = $this->ImageUser->patchEntity($imageUser, $this->request->data);
            if ($this->ImageUser->save($imageUser)) {
                $this->Flash->success(__('The image user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The image user could not be saved. Please, try again.'));
            }
        }
        $images = $this->ImageUser->Images->find('list', ['limit' => 200]);
        $users = $this->ImageUser->Users->find('list', ['limit' => 200]);
        $this->set(compact('imageUser', 'images', 'users'));
        $this->set('_serialize', ['imageUser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Image User id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $imageUser = $this->ImageUser->get($id);
        if ($this->ImageUser->delete($imageUser)) {
            $this->Flash->success(__('The image user has been deleted.'));
        } else {
            $this->Flash->error(__('The image user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
