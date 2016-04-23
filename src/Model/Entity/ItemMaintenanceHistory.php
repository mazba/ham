<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ItemMaintenanceHistory Entity.
 *
 * @property int $id
 * @property int $office_id
 * @property \App\Model\Entity\Office $office
 * @property int $supplier_id
 * @property \App\Model\Entity\Supplier $supplier
 * @property int $item_id
 * @property \App\Model\Entity\Item $item
 * @property int $type
 * @property int $start_date
 * @property int $completion_date
 * @property int $warranty_covered
 * @property float $cost
 * @property string $remarks
 * @property int $status
 * @property int $create_time
 * @property int $update_time
 * @property int $create_by
 * @property int $update_by
 */
class ItemMaintenanceHistory extends Entity
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
