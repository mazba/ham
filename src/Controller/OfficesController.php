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
            'contain' => ['parentOffices', 'officeLevels', 'areaDivisions', 'areaZones', 'areaDistricts', 'areaUpazilas']
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
            'contain' => ['ParentOffices', 'OfficeLevels', 'AreaDivisions', 'AreaZones', 'AreaDistricts', 'AreaUpazilas', 'Committees', 'Designations', 'ItemAssigns', 'ItemDepreciations', 'ItemDocuments', 'ItemMaintenanceHistories', 'ItemMaintenances', 'ItemVehicles', 'ItemWithdrawals', 'Items', 'JobRanks', 'OfficeBuildings', 'OfficeGarages', 'OfficeModuleSettings', 'OfficeRooms', 'OfficeUnitDesignations', 'OfficeUnits', 'OfficeWarehouses', 'ChildOffices', 'SupplierDealingDetails', 'Suppliers', 'UserActionHistories', 'UserCommittees', 'UserDesignations', 'UserEmploymentHistories', 'UserLeaves', 'UserMedicals', 'UserPayInformations', 'UserPerformanceReports', 'Users']
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
        $parentOffices = $this->Offices->ParentOffices->find('list', ['limit' => 200]);
        $officeLevels = $this->Offices->OfficeLevels->find('list', ['limit' => 200]);
        $areaDivisions = $this->Offices->AreaDivisions->find('list', ['limit' => 200]);
        $areaZones = $this->Offices->AreaZones->find('list', ['limit' => 200]);
        $areaDistricts = $this->Offices->AreaDistricts->find('list', ['limit' => 200]);
        $areaUpazilas = $this->Offices->AreaUpazilas->find('list', ['limit' => 200]);
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
        $parentOffices = $this->Offices->ParentOffices->find('list', ['limit' => 200]);
        $officeLevels = $this->Offices->OfficeLevels->find('list', ['limit' => 200]);
        $areaDivisions = $this->Offices->AreaDivisions->find('list', ['limit' => 200]);
        $areaZones = $this->Offices->AreaZones->find('list', ['limit' => 200]);
        $areaDistricts = $this->Offices->AreaDistricts->find('list', ['limit' => 200]);
        $areaUpazilas = $this->Offices->AreaUpazilas->find('list', ['limit' => 200]);
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
    }
}
