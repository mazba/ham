<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Manufacturers Controller
 *
 * @property \App\Model\Table\ManufacturersTable $Manufacturers
 */
class ManufacturersController extends AppController
{

	public $paginate = [
        'limit' => 15,
        'order' => [
            'Manufacturers.title' => 'desc'
        ]
    ];

/**
* Index method
*
* @return void
*/
public function index()
{
			$manufacturers = $this->Manufacturers->find('all', [
	'conditions' =>['Manufacturers.status !=' => 99]
	]);
		$this->set('manufacturers', $this->paginate($manufacturers) );
	$this->set('_serialize', ['manufacturers']);
	}

    /**
     * View method
     *
     * @param string|null $id Manufacturer id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user=$this->Auth->user();
        $manufacturer = $this->Manufacturers->get($id, [
            'contain' => []
        ]);
        $this->set('manufacturer', $manufacturer);
        $this->set('_serialize', ['manufacturer']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user=$this->Auth->user();
        $time=time();
        $manufacturer = $this->Manufacturers->newEntity();
        if ($this->request->is('post'))
        {

            $data=$this->request->data;
            $data['create_by']=$user['id'];
            $data['create_date']=$time;
            $manufacturer = $this->Manufacturers->patchEntity($manufacturer, $data);
            if ($this->Manufacturers->save($manufacturer))
            {
                $this->Flash->success('The manufacturer has been saved.');
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error('The manufacturer could not be saved. Please, try again.');
            }
        }
        $this->set(compact('manufacturer'));
        $this->set('_serialize', ['manufacturer']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Manufacturer id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user=$this->Auth->user();
        $time=time();
        $manufacturer = $this->Manufacturers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put']))
        {
            $data=$this->request->data;
            $data['update_by']=$user['id'];
            $data['update_date']=$time;
            $manufacturer = $this->Manufacturers->patchEntity($manufacturer, $data);
            if ($this->Manufacturers->save($manufacturer))
            {
                $this->Flash->success('The manufacturer has been saved.');
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error('The manufacturer could not be saved. Please, try again.');
            }
        }
        $this->set(compact('manufacturer'));
        $this->set('_serialize', ['manufacturer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Manufacturer id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {

        $manufacturer = $this->Manufacturers->get($id);

        $user=$this->Auth->user();
        $data=$this->request->data;
        $data['updated_by']=$user['id'];
        $data['updated_date']=time();
        $data['status']=99;
        $manufacturer = $this->Manufacturers->patchEntity($manufacturer, $data);
        if ($this->Manufacturers->save($manufacturer))
        {
            $this->Flash->success('The manufacturer has been deleted.');
        }
        else
        {
            $this->Flash->error('The manufacturer could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
