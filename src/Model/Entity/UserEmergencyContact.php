<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserType Entity.
 */
class UserEmergencyContact extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
