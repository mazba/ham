<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OfficeLevels Controller
 *
 * @property \App\Model\Table\OfficeLevelsTable $OfficeLevels
 */
class OfficeLevelsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ParentOfficeLevels']
        ];
        $this->set('officeLevels', $this->paginate($this->OfficeLevels));
        $this->set('_serialize', ['officeLevels']);
    }

    /**
     * View method
     *
     * @param string|null $id Office Level id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $officeLevel = $this->OfficeLevels->get($id, [
            'contain' => ['ParentOfficeLevels', 'ChildOfficeLevels', 'OfficeUnits', 'Offices']
        ]);
        $this->set('officeLevel', $officeLevel);
        $this->set('_serialize', ['officeLevel']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $officeLevel = $this->OfficeLevels->newEntity();
        if ($this->request->is('post')) {
            $officeLevel = $this->OfficeLevels->patchEntity($officeLevel, $this->request->data);
            if ($this->OfficeLevels->save($officeLevel)) {
                $this->Flash->success(__('The office level has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The office level could not be saved. Please, try again.'));
            }
        }
        $parentOfficeLevels = $this->OfficeLevels->ParentOfficeLevels->find('list', ['limit' => 200]);
        $this->set(compact('officeLevel', 'parentOfficeLevels'));
        $this->set('_serialize', ['officeLevel']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Office Level id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $officeLevel = $this->OfficeLevels->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $officeLevel = $this->OfficeLevels->patchEntity($officeLevel, $this->request->data);
            if ($this->OfficeLevels->save($officeLevel)) {
                $this->Flash->success(__('The office level has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The office level could not be saved. Please, try again.'));
            }
        }
        $parentOfficeLevels = $this->OfficeLevels->ParentOfficeLevels->find('list', ['limit' => 200]);
        $this->set(compact('officeLevel', 'parentOfficeLevels'));
        $this->set('_serialize', ['officeLevel']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Office Level id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $officeLevel = $this->OfficeLevels->get($id);
        if ($this->OfficeLevels->delete($officeLevel)) {
            $this->Flash->success(__('The office level has been deleted.'));
        } else {
            $this->Flash->error(__('The office level could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
