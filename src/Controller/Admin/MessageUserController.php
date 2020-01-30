<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * MessageUser Controller
 *
 * @property \App\Model\Table\MessageUserTable $MessageUser
 */
class MessageUserController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Messages', 'Users']
        ];
        $this->set('messageUser', $this->paginate($this->MessageUser));
        $this->set('_serialize', ['messageUser']);
    }

    /**
     * View method
     *
     * @param string|null $id Message User id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $messageUser = $this->MessageUser->get($id, [
            'contain' => ['Messages', 'Users']
        ]);
        $this->set('messageUser', $messageUser);
        $this->set('_serialize', ['messageUser']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $messageUser = $this->MessageUser->newEntity();
        if ($this->request->is('post')) {
            $messageUser = $this->MessageUser->patchEntity($messageUser, $this->request->data);
            if ($this->MessageUser->save($messageUser)) {
                $this->Flash->success(__('The message user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The message user could not be saved. Please, try again.'));
            }
        }
        $messages = $this->MessageUser->Messages->find('list', ['limit' => 200]);
        $users = $this->MessageUser->Users->find('list', ['limit' => 200]);
        $this->set(compact('messageUser', 'messages', 'users'));
        $this->set('_serialize', ['messageUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Message User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $messageUser = $this->MessageUser->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $messageUser = $this->MessageUser->patchEntity($messageUser, $this->request->data);
            if ($this->MessageUser->save($messageUser)) {
                $this->Flash->success(__('The message user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The message user could not be saved. Please, try again.'));
            }
        }
        $messages = $this->MessageUser->Messages->find('list', ['limit' => 200]);
        $users = $this->MessageUser->Users->find('list', ['limit' => 200]);
        $this->set(compact('messageUser', 'messages', 'users'));
        $this->set('_serialize', ['messageUser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Message User id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $messageUser = $this->MessageUser->get($id);
        if ($this->MessageUser->delete($messageUser)) {
            $this->Flash->success(__('The message user has been deleted.'));
        } else {
            $this->Flash->error(__('The message user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
