<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Friends Controller
 *
 * @property \App\Model\Table\FriendsTable $Friends
 */
class FriendsController extends AppController
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
		$this->set('friends', $this->paginate($this->Friends));
		$this->set('_serialize', ['friends']);
	}

	/**
	 * View method
	 *
	 * @param string|null $id Friend id.
	 * @return void
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function view($id = null)
	{
		$friend = $this->Friends->get($id, [
			'contain' => ['Users', 'Friends']
		]);
		$this->set('friend', $friend);
		$this->set('_serialize', ['friend']);
	}

	/**
	 * Add method
	 *
	 * @return void Redirects on successful add, renders view otherwise.
	 */
	public function add()
	{
		$friend = $this->Friends->newEntity();
		if ($this->request->is('post')) {
			$friend = $this->Friends->patchEntity($friend, $this->request->data);
			if ($this->Friends->save($friend)) {
				$this->Flash->success(__('The friend has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The friend could not be saved. Please, try again.'));
			}
		}
		$users = $this->Friends->Users->find('list', ['limit' => 200]);
		$this->set(compact('friend', 'users'));
		$this->set('_serialize', ['friend']);
	}

	/**
	 * Edit method
	 *
	 * @param string|null $id Friend id.
	 * @return void Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function edit($id = null)
	{
		$friend = $this->Friends->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$friend = $this->Friends->patchEntity($friend, $this->request->data);
			if ($this->Friends->save($friend)) {
				$this->Flash->success(__('The friend has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The friend could not be saved. Please, try again.'));
			}
		}
		$users = $this->Friends->Users->find('list', ['limit' => 200]);
		$this->set(compact('friend', 'users'));
		$this->set('_serialize', ['friend']);
	}

	/**
	 * Delete method
	 *
	 * @param string|null $id Friend id.
	 * @return void Redirects to index.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function delete($id = null)
	{
		$this->request->allowMethod(['post', 'delete']);
		$friend = $this->Friends->get($id);
		if ($this->Friends->delete($friend)) {
			$this->Flash->success(__('The friend has been deleted.'));
		} else {
			$this->Flash->error(__('The friend could not be deleted. Please, try again.'));
		}
		return $this->redirect(['action' => 'index']);
	}
}
