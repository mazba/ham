<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ItemMaintenance Entity.
 *
 * @property int $id
 * @property int $office_id
 * @property \App\Model\Entity\Office $office
 * @property int $supplier_id
 * @property \App\Model\Entity\Supplier $supplier
 * @property int $item_id
 * @property \App\Model\Entity\Item $item
 * @property int $total_maintenance_number
 * @property int $free_maintenance_number
 * @property int $free_maintenance_time_period
 * @property string $maintenance_schedule
 * @property float $each_maintenance_cost
 * @property int $status
 * @property int $create_time
 * @property int $update_time
 * @property int $create_by
 * @property int $update_by
 */
class ItemMaintenance extends Entity
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
