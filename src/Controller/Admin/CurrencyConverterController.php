<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * CurrencyConverter Controller
 *
 * @property \App\Model\Table\CurrencyConverterTable $CurrencyConverter
 */
class CurrencyConverterController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('currencyConverter', $this->paginate($this->CurrencyConverter));
        $this->set('_serialize', ['currencyConverter']);
    }

    /**
     * View method
     *
     * @param string|null $id Currency Converter id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $currencyConverter = $this->CurrencyConverter->get($id, [
            'contain' => []
        ]);
        $this->set('currencyConverter', $currencyConverter);
        $this->set('_serialize', ['currencyConverter']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $currencyConverter = $this->CurrencyConverter->newEntity();
        if ($this->request->is('post')) {
            $currencyConverter = $this->CurrencyConverter->patchEntity($currencyConverter, $this->request->data);
            if ($this->CurrencyConverter->save($currencyConverter)) {
                $this->Flash->success(__('The currency converter has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The currency converter could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('currencyConverter'));
        $this->set('_serialize', ['currencyConverter']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Currency Converter id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $currencyConverter = $this->CurrencyConverter->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $currencyConverter = $this->CurrencyConverter->patchEntity($currencyConverter, $this->request->data);
            if ($this->CurrencyConverter->save($currencyConverter)) {
                $this->Flash->success(__('The currency converter has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The currency converter could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('currencyConverter'));
        $this->set('_serialize', ['currencyConverter']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Currency Converter id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $currencyConverter = $this->CurrencyConverter->get($id);
        if ($this->CurrencyConverter->delete($currencyConverter)) {
            $this->Flash->success(__('The currency converter has been deleted.'));
        } else {
            $this->Flash->error(__('The currency converter could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
