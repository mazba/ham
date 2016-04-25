<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ItemAssign Entity.
 *
 * @property int $id
 * @property int $assign_type
 * @property int $office_id
 * @property \App\Model\Entity\Office $office
 * @property int $office_building_id
 * @property \App\Model\Entity\OfficeBuilding $office_building
 * @property int $office_room_id
 * @property \App\Model\Entity\OfficeRoom $office_room
 * @property int $office_warehouse_id
 * @property \App\Model\Entity\OfficeWarehouse $office_warehouse
 * @property int $office_unit_id
 * @property \App\Model\Entity\OfficeUnit $office_unit
 * @property int $designation_id
 * @property \App\Model\Entity\Designation $designation
 * @property int $designated_user_id
 * @property \App\Model\Entity\DesignatedUser $designated_user
 * @property int $item_id
 * @property \App\Model\Entity\Item $item
 * @property int $quantity
 * @property int $assign_date
 * @property int $expected_usage_time
 * @property string $usage_instruction
 * @property int $next_maintainance_date
 * @property int $status
 * @property int $create_time
 * @property int $update_time
 * @property int $create_by
 * @property int $update_by
 * @property \App\Model\Entity\ItemWithdrawal[] $item_withdrawals
 */
class ItemAssign extends Entity
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
    protected function _getFormattedAssignDate()
    {
        return $this->assign_date ? date('d-m-Y',$this->assign_date) : '';
    }
}
