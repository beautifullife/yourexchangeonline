<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Coins Controller
 *
 * @property \App\Model\Table\CoinsTable $Coins
 */
class CoinsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('coins', $this->paginate($this->Coins));
        $this->set('_serialize', ['coins']);
    }

    /**
     * View method
     *
     * @param string|null $id Coin id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $coin = $this->Coins->get($id, [
            'contain' => []
        ]);
        $this->set('coin', $coin);
        $this->set('_serialize', ['coin']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $coin = $this->Coins->newEntity();
        if ($this->request->is('post')) {
            $coin = $this->Coins->patchEntity($coin, $this->request->data);
            if ($this->Coins->save($coin)) {
                $this->Flash->success(__('The coin has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The coin could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('coin'));
        $this->set('_serialize', ['coin']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Coin id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $coin = $this->Coins->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $coin = $this->Coins->patchEntity($coin, $this->request->data);
            if ($this->Coins->save($coin)) {
                $this->Flash->success(__('The coin has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The coin could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('coin'));
        $this->set('_serialize', ['coin']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Coin id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $coin = $this->Coins->get($id);
        if ($this->Coins->delete($coin)) {
            $this->Flash->success(__('The coin has been deleted.'));
        } else {
            $this->Flash->error(__('The coin could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
