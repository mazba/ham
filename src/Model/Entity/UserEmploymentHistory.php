<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserType Entity.
 */
class UserEmploymentHistory extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

    protected function _getStartDate($start_date)
    {
        return $start_date ? date('d-m-Y', $start_date) : '';
    }

    protected function _setStartDate($start_date)
    {
        return $start_date ? strtotime($start_date) : 0;
    }

    protected function _getEndDate($end_date)
    {
        return $end_date ? date('d-m-Y', $end_date) : '';
    }

    protected function _setEndDate($end_date)
    {
        return $end_date ? strtotime($end_date) : 0;
    }
}
