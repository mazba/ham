<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Committee Entity.
 */
class Committee extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
