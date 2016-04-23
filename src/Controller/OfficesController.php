<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Offices Controller
 *
 * @property \App\Model\Table\OfficesTable $Offices
 */
class OfficesController extends AppController
{
    public $paginate = [
        'limit' => 10
    ];
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $query = $this->Offices->find('all', [
            'contain' => ['ParentOffices', 'OfficeLevels', 'AreaDivisions', 'AreaZones', 'AreaDistricts', 'AreaUpazilas']
        ]);
        $this->set('offices',$this->paginate($query));
    }

    /**
     * View method
     *
     * @param string|null $id Office id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $office = $this->Offices->get($id, [
            'contain' => ['ParentOffices', 'OfficeLevels', 'Users']
        ]);
        $this->set('office', $office);
        $this->set('_serialize', ['office']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $office = $this->Offices->newEntity();
        if ($this->request->is('post')) {
            $office = $this->Offices->patchEntity($office, $this->request->data);
            if ($this->Offices->save($office)) {
                $this->Flash->success(__('The office has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The office could not be saved. Please, try again.'));
            }
        }
        $parentOffices = $this->Offices->ParentOffices->find('list');
        $officeLevels = $this->Offices->OfficeLevels->find('list');
        $areaDivisions = $this->Offices->AreaDivisions->find('list');
        $this->set(compact('office', 'parentOffices', 'officeLevels', 'areaDivisions'));
        $this->set('_serialize', ['office']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Office id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $office = $this->Offices->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $office = $this->Offices->patchEntity($office, $this->request->data);
            if ($this->Offices->save($office)) {
                $this->Flash->success(__('The office has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The office could not be saved. Please, try again.'));
            }
        }
        $parentOffices = $this->Offices->ParentOffices->find('list');
        $officeLevels = $this->Offices->OfficeLevels->find('list');
        $areaDivisions = $this->Offices->AreaDivisions->find('list');
        $areaZones = $this->Offices->AreaZones->find('list');
        $areaDistricts = $this->Offices->AreaDistricts->find('list');
        $areaUpazilas = $this->Offices->AreaUpazilas->find('list')->where(['area_division_id'=>$office['area_division_id'],'area_district_id'=>$office['area_district_id']]);
        $this->set(compact('office', 'parentOffices', 'officeLevels', 'areaDivisions', 'areaZones', 'areaDistricts', 'areaUpazilas'));
        $this->set('_serialize', ['office']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Office id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $office = $this->Offices->get($id);
        if ($this->Offices->delete($office)) {
            $this->Flash->success(__('The office has been deleted.'));
        } else {
            $this->Flash->error(__('The office could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    /**
     * ajax method
     *
     */
    public function ajax($action){
        if($action == 'get_zone_district')
        {
            $division_id = $this->request->data('division_id');
            $AreaDistricts=$this->Offices->AreaDistricts->find('list')->where(['area_division_id'=>$division_id]);
            $AreaZones=$this->Offices->AreaZones->find('list')->where(['area_division_id'=>$division_id]);
            $this->response->body(json_encode(['district'=>$AreaDistricts,'zone'=>$AreaZones]));
            return $this->response;
        }
        elseif($action == 'get_upazila')
        {
            $division_id = $this->request->data('division_id');
            $district_id = $this->request->data('district_id');
            $AreaUpazilas=$this->Offices->AreaUpazilas->find('list')->where(['area_division_id'=>$division_id,'area_district_id'=>$district_id]);
            $this->response->body(json_encode($AreaUpazilas));
            return $this->response;
        }
    }
}
