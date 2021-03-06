<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * BlogPosts Controller
 *
 * @property \App\Model\Table\BlogPostsTable $BlogPosts
 */
class BlogPostsController extends AppController
{
    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->Auth->allow('index');
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('blogPosts', $this->paginate($this->BlogPosts));
        $this->set('_serialize', ['blogPosts']);
    }

    /**
     * View method
     *
     * @param string|null $id Blog Post id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $blogPost = $this->BlogPosts->get($id, [
            'contain' => []
        ]);
        $this->set('blogPost', $blogPost);
        $this->set('_serialize', ['blogPost']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $blogPost = $this->BlogPosts->newEntity();
        if ($this->request->is('post')) {
            $blogPost = $this->BlogPosts->patchEntity($blogPost, $this->request->data);
            if ($this->BlogPosts->save($blogPost)) {
                $this->Flash->success(__('The blog post has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The blog post could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('blogPost'));
        $this->set('_serialize', ['blogPost']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Blog Post id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $blogPost = $this->BlogPosts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $blogPost = $this->BlogPosts->patchEntity($blogPost, $this->request->data);
            if ($this->BlogPosts->save($blogPost)) {
                $this->Flash->success(__('The blog post has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The blog post could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('blogPost'));
        $this->set('_serialize', ['blogPost']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Blog Post id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $blogPost = $this->BlogPosts->get($id);
        if ($this->BlogPosts->delete($blogPost)) {
            $this->Flash->success(__('The blog post has been deleted.'));
        } else {
            $this->Flash->error(__('The blog post could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
