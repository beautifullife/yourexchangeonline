<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * RatingPost Controller
 *
 * @property \App\Model\Table\RatingPostTable $RatingPost
 */
class RatingPostController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Posts']
        ];
        $this->set('ratingPost', $this->paginate($this->RatingPost));
        $this->set('_serialize', ['ratingPost']);
    }

    /**
     * View method
     *
     * @param string|null $id Rating Post id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ratingPost = $this->RatingPost->get($id, [
            'contain' => ['Posts']
        ]);
        $this->set('ratingPost', $ratingPost);
        $this->set('_serialize', ['ratingPost']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ratingPost = $this->RatingPost->newEntity();
        if ($this->request->is('post')) {
            $ratingPost = $this->RatingPost->patchEntity($ratingPost, $this->request->data);
            if ($this->RatingPost->save($ratingPost)) {
                $this->Flash->success(__('The rating post has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The rating post could not be saved. Please, try again.'));
            }
        }
        $posts = $this->RatingPost->Posts->find('list', ['limit' => 200]);
        $this->set(compact('ratingPost', 'posts'));
        $this->set('_serialize', ['ratingPost']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Rating Post id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ratingPost = $this->RatingPost->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ratingPost = $this->RatingPost->patchEntity($ratingPost, $this->request->data);
            if ($this->RatingPost->save($ratingPost)) {
                $this->Flash->success(__('The rating post has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The rating post could not be saved. Please, try again.'));
            }
        }
        $posts = $this->RatingPost->Posts->find('list', ['limit' => 200]);
        $this->set(compact('ratingPost', 'posts'));
        $this->set('_serialize', ['ratingPost']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Rating Post id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ratingPost = $this->RatingPost->get($id);
        if ($this->RatingPost->delete($ratingPost)) {
            $this->Flash->success(__('The rating post has been deleted.'));
        } else {
            $this->Flash->error(__('The rating post could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
