<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Dashboard cell
 */
class DashboardCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */
    public function superAdmin()
    {
        $this->loadModel('Offices');
        $this->loadModel('Users');
        $this->loadModel('Items');
        $office_number = $this->Offices->find('all')->where(['status'=>1])->count();
        $user_number = $this->Users->find('all')->where(['status'=>1])->count();
        $item_number = $this->Items->find('all')->where(['status'=>1])->count();
        $this->set(compact('office_number','user_number','item_number'));

    }
    public function officeAdmin()
    {

    }
    public function officeUser()
    {

    }
}
