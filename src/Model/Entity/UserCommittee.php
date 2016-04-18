<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserCommittee Entity.
 */
class UserCommittee extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
