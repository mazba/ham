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
        $this->loadModel('ItemAssigns');
        $user = $this->Auth->user();
        $items = $this->ItemAssigns
            ->find()
            ->where([
                'ItemAssigns.status'=>1,
                'ItemAssigns.designated_user_id'=>$user['id']
            ])
            ->contain(['Items']);

        $this->set('items', $items);
        $this->set('_serialize', ['items']);


    }

    
}
