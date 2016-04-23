<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserType Entity.
 */
class UserDesignation extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

    protected function _getStartingDate($starting_date)
    {
        return $starting_date ? date('d-m-Y', $starting_date) : '';
    }

    protected function _setStartingDate($starting_date)
    {
        return $starting_date ? strtotime($starting_date) : 0;
    }

    protected function _getEndingDate($ending_date)
    {
        return $ending_date ? date('d-m-Y', $ending_date) : '';
    }

    protected function _setEndingDate($ending_date)
    {
        return $ending_date ? strtotime($ending_date) : 0;
    }
}
