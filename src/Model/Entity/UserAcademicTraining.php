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

    protected function _setStartingTime($starting_time)
    {
        return $starting_time ? strtotime($starting_time) : 0;
    }

    protected function _setCompletionTime($completion_time)
    {
        return $completion_time ? strtotime($completion_time) : 0;
    }

}
