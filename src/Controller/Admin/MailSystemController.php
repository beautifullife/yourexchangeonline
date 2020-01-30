<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * MailSystem Controller
 *
 * @property \App\Model\Table\MailSystemTable $MailSystem
 */
class MailSystemController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('mailSystem', $this->paginate($this->MailSystem));
        $this->set('_serialize', ['mailSystem']);
    }

    /**
     * View method
     *
     * @param string|null $id Mail System id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mailSystem = $this->MailSystem->get($id, [
            'contain' => []
        ]);
        $this->set('mailSystem', $mailSystem);
        $this->set('_serialize', ['mailSystem']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mailSystem = $this->MailSystem->newEntity();
        if ($this->request->is('post')) {
            $mailSystem = $this->MailSystem->patchEntity($mailSystem, $this->request->data);
            if ($this->MailSystem->save($mailSystem)) {
                $this->Flash->success(__('The mail system has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The mail system could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('mailSystem'));
        $this->set('_serialize', ['mailSystem']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Mail System id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mailSystem = $this->MailSystem->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mailSystem = $this->MailSystem->patchEntity($mailSystem, $this->request->data);
            if ($this->MailSystem->save($mailSystem)) {
                $this->Flash->success(__('The mail system has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The mail system could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('mailSystem'));
        $this->set('_serialize', ['mailSystem']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Mail System id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mailSystem = $this->MailSystem->get($id);
        if ($this->MailSystem->delete($mailSystem)) {
            $this->Flash->success(__('The mail system has been deleted.'));
        } else {
            $this->Flash->error(__('The mail system could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
