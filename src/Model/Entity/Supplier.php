<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Supplier Entity.
 *
 * @property int $id
 * @property int $parent_id
 * @property \App\Model\Entity\Supplier $parent_supplier
 * @property int $office_id
 * @property \App\Model\Entity\Office $office
 * @property int $is_global
 * @property string $code
 * @property int $type
 * @property string $name_bn
 * @property string $name_en
 * @property string $phone
 * @property string $fax
 * @property string $website
 * @property string $email
 * @property string $cell_phone
 * @property string $post_code
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $contact_address
 * @property string $billing_address
 * @property string $contact_person_name
 * @property string $contact_person_designation
 * @property string $contact_person_cell_number
 * @property string $contact_person_email
 * @property string $supplier_major_sector
 * @property string $supplier_major_product_tag
 * @property string $agreement_attach_file
 * @property int $agreement_duration
 * @property string $description
 * @property string $remarks
 * @property int $status
 * @property int $create_time
 * @property int $update_time
 * @property int $create_by
 * @property int $update_by
 * @property \App\Model\Entity\ItemMaintenanceHistory[] $item_maintenance_histories
 * @property \App\Model\Entity\ItemMaintenance[] $item_maintenances
 * @property \App\Model\Entity\Item[] $items
 * @property \App\Model\Entity\SupplierDealingDetail[] $supplier_dealing_details
 * @property \App\Model\Entity\Supplier[] $child_suppliers
 */
class Supplier extends Entity
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
        'agreement_attach_file' => true
    ];
}
