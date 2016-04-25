<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MyItems Controller
 *
 * @property \App\Model\Table\MyItemsTable $MyItems
 */
class MyItemsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('myItems', $this->paginate($this->MyItems));
        $this->set('_serialize', ['myItems']);
    }

    /**
     * View method
     *
     * @param string|null $id My Item id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $myItem = $this->MyItems->get($id, [
            'contain' => []
        ]);
        $this->set('myItem', $myItem);
        $this->set('_serialize', ['myItem']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $myItem = $this->MyItems->newEntity();
        if ($this->request->is('post')) {
            $myItem = $this->MyItems->patchEntity($myItem, $this->request->data);
            if ($this->MyItems->save($myItem)) {
                $this->Flash->success(__('The my item has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The my item could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('myItem'));
        $this->set('_serialize', ['myItem']);
    }

    /**
     * Edit method
     *
     * @param string|null $id My Item id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $myItem = $this->MyItems->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $myItem = $this->MyItems->patchEntity($myItem, $this->request->data);
            if ($this->MyItems->save($myItem)) {
                $this->Flash->success(__('The my item has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The my item could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('myItem'));
        $this->set('_serialize', ['myItem']);
    }

    /**
     * Delete method
     *
     * @param string|null $id My Item id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $myItem = $this->MyItems->get($id);
        if ($this->MyItems->delete($myItem)) {
            $this->Flash->success(__('The my item has been deleted.'));
        } else {
            $this->Flash->error(__('The my item could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
