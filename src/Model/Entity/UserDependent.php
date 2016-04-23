<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserType Entity.
 */
class UserDependent extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

    protected function _getDateOfBirth($date_of_birth)
    {
        return $date_of_birth ? date('d-m-Y', $date_of_birth) : '';
    }

    protected function _setDateOfBirth($date_of_birth)
    {
        return $date_of_birth ? strtotime($date_of_birth) : 0;
    }
}
