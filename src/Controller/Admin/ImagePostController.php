<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ImagePost Controller
 *
 * @property \App\Model\Table\ImagePostTable $ImagePost
 */
class ImagePostController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Posts', 'Images']
        ];
        $this->set('imagePost', $this->paginate($this->ImagePost));
        $this->set('_serialize', ['imagePost']);
    }

    /**
     * View method
     *
     * @param string|null $id Image Post id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $imagePost = $this->ImagePost->get($id, [
            'contain' => ['Posts', 'Images']
        ]);
        $this->set('imagePost', $imagePost);
        $this->set('_serialize', ['imagePost']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $imagePost = $this->ImagePost->newEntity();
        if ($this->request->is('post')) {
            $imagePost = $this->ImagePost->patchEntity($imagePost, $this->request->data);
            if ($this->ImagePost->save($imagePost)) {
                $this->Flash->success(__('The image post has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The image post could not be saved. Please, try again.'));
            }
        }
        $posts = $this->ImagePost->Posts->find('list', ['limit' => 200]);
        $images = $this->ImagePost->Images->find('list', ['limit' => 200]);
        $this->set(compact('imagePost', 'posts', 'images'));
        $this->set('_serialize', ['imagePost']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Image Post id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $imagePost = $this->ImagePost->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $imagePost = $this->ImagePost->patchEntity($imagePost, $this->request->data);
            if ($this->ImagePost->save($imagePost)) {
                $this->Flash->success(__('The image post has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The image post could not be saved. Please, try again.'));
            }
        }
        $posts = $this->ImagePost->Posts->find('list', ['limit' => 200]);
        $images = $this->ImagePost->Images->find('list', ['limit' => 200]);
        $this->set(compact('imagePost', 'posts', 'images'));
        $this->set('_serialize', ['imagePost']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Image Post id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $imagePost = $this->ImagePost->get($id);
        if ($this->ImagePost->delete($imagePost)) {
            $this->Flash->success(__('The image post has been deleted.'));
        } else {
            $this->Flash->error(__('The image post could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
