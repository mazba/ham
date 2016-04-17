<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AssetNatures Controller
 *
 * @property \App\Model\Table\AssetNaturesTable $AssetNatures
 */
class AssetNaturesController extends AppController
{

	public $paginate = [
        'limit' => 15,
        'order' => [
            'AssetNatures.title' => 'desc'
        ]
    ];

/**
* Index method
*
* @return void
*/
public function index()
{
$assetNatures = $this->AssetNatures->find('all', [
'conditions' =>['AssetNatures.status !=' => 99],
'contain' => ['ParentAssetNatures']
]);
$this->set('assetNatures', $this->paginate($assetNatures) );
$this->set('_serialize', ['assetNatures']);
}

    /**
     * View method
     *
     * @param string|null $id Asset Nature id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user=$this->Auth->user();
        $assetNature = $this->AssetNatures->get($id, [
            'contain' => ['ParentAssetNatures', 'ChildAssetNatures', 'Items']
        ]);
        $this->set('assetNature', $assetNature);
        $this->set('_serialize', ['assetNature']);
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
        $assetNature = $this->AssetNatures->newEntity();
        if ($this->request->is('post'))
        {

            $data=$this->request->data;
            $data['create_by']=$user['id'];
            $data['create_date']=$time;
            $assetNature = $this->AssetNatures->patchEntity($assetNature, $data);
            if ($this->AssetNatures->save($assetNature))
            {
                $this->Flash->success('The asset nature has been saved.');
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error('The asset nature could not be saved. Please, try again.');
            }
        }
        $parentAssetNatures = $this->AssetNatures->ParentAssetNatures->find('list', ['limit' => 200]);
        $this->set(compact('assetNature', 'parentAssetNatures'));
        $this->set('_serialize', ['assetNature']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Asset Nature id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user=$this->Auth->user();
        $time=time();
        $assetNature = $this->AssetNatures->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put']))
        {
            $data=$this->request->data;
            $data['update_by']=$user['id'];
            $data['update_date']=$time;
            $assetNature = $this->AssetNatures->patchEntity($assetNature, $data);
            if ($this->AssetNatures->save($assetNature))
            {
                $this->Flash->success('The asset nature has been saved.');
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error('The asset nature could not be saved. Please, try again.');
            }
        }
        $parentAssetNatures = $this->AssetNatures->ParentAssetNatures->find('list', ['limit' => 200]);
        $this->set(compact('assetNature', 'parentAssetNatures'));
        $this->set('_serialize', ['assetNature']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Asset Nature id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {

        $assetNature = $this->AssetNatures->get($id);

        $user=$this->Auth->user();
        $data=$this->request->data;
        $data['updated_by']=$user['id'];
        $data['updated_date']=time();
        $data['status']=99;
        $assetNature = $this->AssetNatures->patchEntity($assetNature, $data);
        if ($this->AssetNatures->save($assetNature))
        {
            $this->Flash->success('The asset nature has been deleted.');
        }
        else
        {
            $this->Flash->error('The asset nature could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
