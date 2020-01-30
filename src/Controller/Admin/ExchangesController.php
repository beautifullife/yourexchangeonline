<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Exchanges Controller
 *
 * @property \App\Model\Table\ExchangesTable $Exchanges
 */
class ExchangesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['posts']
        ];
        $this->set('exchanges', $this->paginate($this->Exchanges));
        $this->set('_serialize', ['exchanges']);
    }

    /**
     * View method
     *
     * @param string|null $id Exchange id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $exchange = $this->Exchanges->get($id, [
            'contain' => ['posts']
        ]);
        $this->set('exchange', $exchange);
        $this->set('_serialize', ['exchange']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $exchange = $this->Exchanges->newEntity();
        if ($this->request->is('post')) {
            $exchange = $this->Exchanges->patchEntity($exchange, $this->request->data);
            if ($this->Exchanges->save($exchange)) {
                $this->Flash->success(__('The exchange has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The exchange could not be saved. Please, try again.'));
            }
        }
        $posts = $this->Exchanges->Posts->find('list', ['limit' => 200]);
        $this->set(compact('exchange', 'posts'));
        $this->set('_serialize', ['exchange']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Exchange id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $exchange = $this->Exchanges->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $exchange = $this->Exchanges->patchEntity($exchange, $this->request->data);
            if ($this->Exchanges->save($exchange)) {
                $this->Flash->success(__('The exchange has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The exchange could not be saved. Please, try again.'));
            }
        }
        $posts = $this->Exchanges->FromPosts->find('list', ['limit' => 200]);
        $this->set(compact('exchange', 'posts'));
        $this->set('_serialize', ['exchange']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Exchange id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $exchange = $this->Exchanges->get($id);
        if ($this->Exchanges->delete($exchange)) {
            $this->Flash->success(__('The exchange has been deleted.'));
        } else {
            $this->Flash->error(__('The exchange could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
