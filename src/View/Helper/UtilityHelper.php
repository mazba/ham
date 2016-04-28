<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;
use Cake\ORM\TableRegistry;


class UtilityHelper extends Helper
{
    public function getDesignations($office_id)
    {
        $designations = TableRegistry::get('designations')->find('list')->where(['status'=>1, 'office_id'=>$office_id])->toArray();
        return $designations;
    }

    public function getOfficeUnits($office_id)
    {
        $units = TableRegistry::get('office_units')->find('list')->where(['status'=>1, 'office_id'=>$office_id])->toArray();
        return $units;
    }

    public function getOfficeUnitDesignations($office_id, $office_unit_id)
    {
        $unitDesignations = TableRegistry::get('office_unit_designations')->find('list')->where(['status'=>1, 'office_id'=>$office_id, 'office_unit_id'=>$office_unit_id])->toArray();
        return $unitDesignations;
    }

}
