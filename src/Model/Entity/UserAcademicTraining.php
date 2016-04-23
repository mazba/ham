<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserType Entity.
 */
class UserAcademicTraining extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

    protected function _getStartingTime($starting_time)
    {
        return $starting_time ? date('d-m-Y', $starting_time) : '';
    }

    protected function _setStartingTime($starting_time)
    {
        return $starting_time ? strtotime($starting_time) : 0;
    }

    protected function _getCompletionTime($completion_time)
    {
        return $completion_time ? date('d-m-Y', $completion_time) : '';
    }

    protected function _setCompletionTime($completion_time)
    {
        return $completion_time ? strtotime($completion_time) : 0;
    }

}
