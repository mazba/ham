<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SupplierDealingDetailManufacturer Entity.
 *
 * @property int $id
 * @property int $supplier_dealing_detail_id
 * @property \App\Model\Entity\SupplierDealingDetail $supplier_dealing_detail
 * @property int $manufacturer_id
 * @property \App\Model\Entity\Manufacturer $manufacturer
 * @property int $status
 */
class SupplierDealingDetailManufacturer extends Entity
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
