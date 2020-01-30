<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * PaymentMethod Controller
 *
 * @property \App\Model\Table\PaymentMethodTable $PaymentMethod
 */
class PaymentMethodController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('paymentMethod', $this->paginate($this->PaymentMethod));
        $this->set('_serialize', ['paymentMethod']);
    }

    /**
     * View method
     *
     * @param string|null $id Payment Method id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $paymentMethod = $this->PaymentMethod->get($id, [
            'contain' => []
        ]);
        $this->set('paymentMethod', $paymentMethod);
        $this->set('_serialize', ['paymentMethod']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $paymentMethod = $this->PaymentMethod->newEntity();
        if ($this->request->is('post')) {
            $paymentMethod = $this->PaymentMethod->patchEntity($paymentMethod, $this->request->data);
            if ($this->PaymentMethod->save($paymentMethod)) {
                $this->Flash->success(__('The payment method has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The payment method could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('paymentMethod'));
        $this->set('_serialize', ['paymentMethod']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Payment Method id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $paymentMethod = $this->PaymentMethod->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $paymentMethod = $this->PaymentMethod->patchEntity($paymentMethod, $this->request->data);
            if ($this->PaymentMethod->save($paymentMethod)) {
                $this->Flash->success(__('The payment method has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The payment method could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('paymentMethod'));
        $this->set('_serialize', ['paymentMethod']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Payment Method id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $paymentMethod = $this->PaymentMethod->get($id);
        if ($this->PaymentMethod->delete($paymentMethod)) {
            $this->Flash->success(__('The payment method has been deleted.'));
        } else {
            $this->Flash->error(__('The payment method could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
