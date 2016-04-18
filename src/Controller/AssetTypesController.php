<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AssetTypes Controller
 *
 * @property \App\Model\Table\AssetTypesTable $AssetTypes
 */
class AssetTypesController extends AppController
{

	public $paginate = [
        'limit' => 15,
        'order' => [
            'AssetTypes.title' => 'desc'
        ]
    ];

/**
* Index method
*
* @return void
*/
public function index()
{
			$assetTypes = $this->AssetTypes->find('all', [
	'conditions' =>['AssetTypes.status !=' => 99],
	'contain' => ['ParentAssetTypes']
	]);
		$this->set('assetTypes', $this->paginate($assetTypes) );
	$this->set('_serialize', ['assetTypes']);
	}

    /**
     * View method
     *
     * @param string|null $id Asset Type id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user=$this->Auth->user();
        $assetType = $this->AssetTypes->get($id, [
            'contain' => ['ParentAssetTypes']
        ]);
        $this->set('assetType', $assetType);
        $this->set('_serialize', ['assetType']);
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
        $assetType = $this->AssetTypes->newEntity();
        if ($this->request->is('post'))
        {

            $data=$this->request->data;
            $data['create_by']=$user['id'];
            $data['create_date']=$time;
            $assetType = $this->AssetTypes->patchEntity($assetType, $data);
            if ($this->AssetTypes->save($assetType))
            {
                $this->Flash->success('The asset type has been saved.');
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error('The asset type could not be saved. Please, try again.');
            }
        }
        $parentAssetTypes = $this->AssetTypes->ParentAssetTypes->find('list', ['limit' => 200, 'conditions'=>['status'=>1]]);
        $this->set(compact('assetType', 'parentAssetTypes'));
        $this->set('_serialize', ['assetType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Asset Type id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user=$this->Auth->user();
        $time=time();
        $assetType = $this->AssetTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put']))
        {
            $data=$this->request->data;
            $data['update_by']=$user['id'];
            $data['update_date']=$time;
            $assetType = $this->AssetTypes->patchEntity($assetType, $data);
            if ($this->AssetTypes->save($assetType))
            {
                $this->Flash->success('The asset type has been saved.');
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error('The asset type could not be saved. Please, try again.');
            }
        }
        $parentAssetTypes = $this->AssetTypes->ParentAssetTypes->find('list', ['limit' => 200, 'conditions'=>['status'=>1]]);
        $this->set(compact('assetType', 'parentAssetTypes'));
        $this->set('_serialize', ['assetType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Asset Type id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {

        $assetType = $this->AssetTypes->get($id);

        $user=$this->Auth->user();
        $data=$this->request->data;
        $data['updated_by']=$user['id'];
        $data['updated_date']=time();
        $data['status']=99;
        $assetType = $this->AssetTypes->patchEntity($assetType, $data);
        if ($this->AssetTypes->save($assetType))
        {
            $this->Flash->success('The asset type has been deleted.');
        }
        else
        {
            $this->Flash->error('The asset type could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
