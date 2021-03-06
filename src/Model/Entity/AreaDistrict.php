<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AreaDistrict Entity.
 *
 * @property string $id
 * @property string $area_division_id
 * @property \App\Model\Entity\AreaDivision $area_division
 * @property string $area_zone_id
 * @property \App\Model\Entity\AreaZone $area_zone
 * @property int $dglr_code
 * @property string $name_en
 * @property string $name_bn
 * @property int $status
 * @property int $created_by
 * @property int $created_date
 * @property int $updated_by
 * @property int $updated_date
 * @property \App\Model\Entity\AreaUpazila[] $area_upazilas
 * @property \App\Model\Entity\Office[] $offices
 */
class AreaDistrict extends Entity
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
