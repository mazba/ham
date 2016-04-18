<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ItemCategories Controller
 *
 * @property \App\Model\Table\ItemCategoriesTable $ItemCategories
 */
class ItemCategoriesController extends AppController
{

	public $paginate = [
        'limit' => 15,
        'order' => [
            'ItemCategories.id' => 'desc'
        ]
    ];

/**
* Index method
*
* @return void
*/
public function index()
{
			$itemCategories = $this->ItemCategories->find('all', [
	'conditions' =>['ItemCategories.status !=' => 99],
	'contain' => ['ParentItemCategories']
	]);
		$this->set('itemCategories', $this->paginate($itemCategories) );
	$this->set('_serialize', ['itemCategories']);
	}

    /**
     * View method
     *
     * @param string|null $id Item Category id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user=$this->Auth->user();
        $itemCategory = $this->ItemCategories->get($id, [
            'contain' => ['ParentItemCategories']
        ]);
        $this->set('itemCategory', $itemCategory);
        $this->set('_serialize', ['itemCategory']);
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
        $itemCategory = $this->ItemCategories->newEntity();
        if ($this->request->is('post'))
        {

            $data=$this->request->data;
            $data['create_by']=$user['id'];
            $data['create_date']=$time;
            $itemCategory = $this->ItemCategories->patchEntity($itemCategory, $data);
            if ($this->ItemCategories->save($itemCategory))
            {
                $this->Flash->success('The item category has been saved.');
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error('The item category could not be saved. Please, try again.');
            }
        }
        $parentItemCategories = $this->ItemCategories->ParentItemCategories->find('list', ['conditions'=>['status'=>1]]);
        $this->set(compact('itemCategory', 'parentItemCategories'));
        $this->set('_serialize', ['itemCategory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Item Category id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user=$this->Auth->user();
        $time=time();
        $itemCategory = $this->ItemCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put']))
        {
            $data=$this->request->data;
            $data['update_by']=$user['id'];
            $data['update_date']=$time;
            $itemCategory = $this->ItemCategories->patchEntity($itemCategory, $data);
            if ($this->ItemCategories->save($itemCategory))
            {
                $this->Flash->success('The item category has been saved.');
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error('The item category could not be saved. Please, try again.');
            }
        }
        $parentItemCategories = $this->ItemCategories->ParentItemCategories->find('list', ['conditions'=>['status'=>1]]);
        $this->set(compact('itemCategory', 'parentItemCategories'));
        $this->set('_serialize', ['itemCategory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Item Category id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {

        $itemCategory = $this->ItemCategories->get($id);

        $user=$this->Auth->user();
        $data=$this->request->data;
        $data['updated_by']=$user['id'];
        $data['updated_date']=time();
        $data['status']=99;
        $itemCategory = $this->ItemCategories->patchEntity($itemCategory, $data);
        if ($this->ItemCategories->save($itemCategory))
        {
            $this->Flash->success('The item category has been deleted.');
        }
        else
        {
            $this->Flash->error('The item category could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
