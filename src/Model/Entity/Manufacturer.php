<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Manufacturer Entity.
 *
 * @property int $id
 * @property string $code
 * @property string $name_bn
 * @property string $name_en
 * @property string $phone
 * @property string $fax
 * @property string $website
 * @property string $email
 * @property string $cell_phone
 * @property string $country
 * @property string $address
 * @property string $major_sector
 * @property string $major_product_tag
 * @property string $description
 * @property string $remarks
 * @property int $status
 * @property int $create_time
 * @property int $update_time
 * @property int $create_by
 * @property int $update_by
 * @property \App\Model\Entity\Item[] $items
 * @property \App\Model\Entity\SupplierDealingDetail[] $supplier_dealing_details
 */
class Manufacturer extends Entity
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
