<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ItemCategory Entity.
 */
class ItemCategory extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
