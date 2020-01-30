<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * RatingUser Controller
 *
 * @property \App\Model\Table\RatingUserTable $RatingUser
 */
class RatingUserController extends AppController
{

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
        $this->set('ratingUser', $this->paginate($this->RatingUser));
        $this->set('_serialize', ['ratingUser']);
    }

    /**
     * View method
     *
     * @param string|null $id Rating User id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ratingUser = $this->RatingUser->get($id, [
            'contain' => ['Users']
        ]);
        $this->set('ratingUser', $ratingUser);
        $this->set('_serialize', ['ratingUser']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ratingUser = $this->RatingUser->newEntity();
        if ($this->request->is('post')) {
            $ratingUser = $this->RatingUser->patchEntity($ratingUser, $this->request->data);
            if ($this->RatingUser->save($ratingUser)) {
                $this->Flash->success(__('The rating user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The rating user could not be saved. Please, try again.'));
            }
        }
        $users = $this->RatingUser->Users->find('list', ['limit' => 200]);
        $this->set(compact('ratingUser', 'users'));
        $this->set('_serialize', ['ratingUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Rating User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ratingUser = $this->RatingUser->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ratingUser = $this->RatingUser->patchEntity($ratingUser, $this->request->data);
            if ($this->RatingUser->save($ratingUser)) {
                $this->Flash->success(__('The rating user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The rating user could not be saved. Please, try again.'));
            }
        }
        $users = $this->RatingUser->Users->find('list', ['limit' => 200]);
        $this->set(compact('ratingUser', 'users'));
        $this->set('_serialize', ['ratingUser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Rating User id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ratingUser = $this->RatingUser->get($id);
        if ($this->RatingUser->delete($ratingUser)) {
            $this->Flash->success(__('The rating user has been deleted.'));
        } else {
            $this->Flash->error(__('The rating user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
