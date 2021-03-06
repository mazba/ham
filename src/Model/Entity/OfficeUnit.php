<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OfficeUnit Entity.
 *
 * @property int $id
 * @property int $parent_id
 * @property \App\Model\Entity\OfficeUnit $parent_office_unit
 * @property int $office_level_id
 * @property \App\Model\Entity\OfficeLevel $office_level
 * @property int $office_unit_category_id
 * @property \App\Model\Entity\OfficeUnitCategory $office_unit_category
 * @property int $office_id
 * @property \App\Model\Entity\Office $office
 * @property string $name_bn
 * @property string $name_en
 * @property string $unit_nothi_code
 * @property int $status
 * @property int $create_by
 * @property int $update_by
 * @property int $create_time
 * @property int $update_time
 * @property \App\Model\Entity\ItemAssign[] $item_assigns
 * @property \App\Model\Entity\OfficeRoom[] $office_rooms
 * @property \App\Model\Entity\OfficeUnitDesignation[] $office_unit_designations
 * @property \App\Model\Entity\OfficeUnit[] $child_office_units
 * @property \App\Model\Entity\UserActionHistory[] $user_action_histories
 * @property \App\Model\Entity\UserDesignation[] $user_designations
 * @property \App\Model\Entity\UserEmploymentHistory[] $user_employment_histories
 */
class OfficeUnit extends Entity
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
