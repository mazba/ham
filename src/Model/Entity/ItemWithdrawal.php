<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ItemWithdrawal Entity.
 *
 * @property int $id
 * @property int $item_assign_id
 * @property \App\Model\Entity\ItemAssign $item_assign
 * @property int $withdrawal_type
 * @property int $office_id
 * @property \App\Model\Entity\Office $office
 * @property int $office_warehouse_id
 * @property \App\Model\Entity\OfficeWarehouse $office_warehouse
 * @property int $withdrawal_time
 * @property string $remarks
 * @property int $status
 * @property int $create_time
 * @property int $update_time
 * @property int $create_by
 * @property int $update_by
 */
class ItemWithdrawal extends Entity
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
    protected function _getFormattedWithdrawalTime(){
        return $this->withdrawal_time ? date('d-m-Y',$this->withdrawal_time) : '';
    }
}
