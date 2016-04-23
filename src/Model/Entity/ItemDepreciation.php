<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ItemDepreciation Entity.
 *
 * @property int $id
 * @property int $office_id
 * @property \App\Model\Entity\Office $office
 * @property int $item_id
 * @property \App\Model\Entity\Item $item
 * @property float $basic_cost
 * @property int $method
 * @property float $annual_rate
 * @property float $salvage_value
 * @property int $lifetime
 * @property int $item_use_start_time
 * @property int $status
 * @property int $create_time
 * @property int $update_time
 * @property int $create_by
 * @property int $update_by
 */
class ItemDepreciation extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
