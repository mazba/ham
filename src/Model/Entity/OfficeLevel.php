<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OfficeLevel Entity.
 *
 * @property int $id
 * @property int $parent_id
 * @property \App\Model\Entity\ParentOfficeLevel $parent_office_level
 * @property string $name_bn
 * @property string $name_en
 * @property int $level
 * @property int $sequence
 * @property int $status
 * @property int $create_time
 * @property int $update_time
 * @property int $create_by
 * @property int $update_by
 * @property \App\Model\Entity\ChildOfficeLevel[] $child_office_levels
 * @property \App\Model\Entity\OfficeUnit[] $office_units
 * @property \App\Model\Entity\Office[] $offices
 */
class OfficeLevel extends Entity
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
