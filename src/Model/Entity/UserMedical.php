<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserType Entity.
 */
class UserMedical extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
