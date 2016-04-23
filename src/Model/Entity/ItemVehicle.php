<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ItemVehicle Entity.
 *
 * @property int $id
 * @property int $office_id
 * @property \App\Model\Entity\Office $office
 * @property int $item_id
 * @property \App\Model\Entity\Item $item
 * @property string $registration_number
 * @property string $prefix_number
 * @property string $engine_number
 * @property string $chasis_number
 * @property string $country_of_origin
 * @property int $fuel_tank_capacity
 * @property int $oil_sump_capacity
 * @property float $load_capacity
 * @property string $engine_capacity
 * @property string $number_plate
 * @property int $status
 * @property int $create_time
 * @property int $update_time
 * @property int $create_by
 * @property int $update_by
 */
class ItemVehicle extends Entity
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
