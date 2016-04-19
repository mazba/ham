<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SupplierDealingDetail Entity.
 *
 * @property int $id
 * @property int $committee_id
 * @property \App\Model\Entity\Committee $committee
 * @property int $user_id
 * @property \App\Model\Entity\User $user
 * @property int $deal_type_id
 * @property int $item_category_id
 * @property \App\Model\Entity\ItemCategory $item_category
 * @property string $title_bn
 * @property string $title_en
 * @property int $deal_start_date
 * @property int $deal_end_date
 * @property string $deal_attach_file
 * @property string $deal_description
 * @property string $deal_remarks
 * @property int $deal_duration
 * @property int $actual_completion_duration
 * @property int $item_number
 * @property float $security_amount
 * @property float $actual_deal_amount
 * @property float $penalty_amount
 * @property float $tax_amount
 * @property float $vat_amount
 * @property float $total_amount
 * @property int $billing_installment_number
 * @property int $final_billing_date
 * @property int $actual_final_billing_date
 * @property int $status
 * @property int $create_time
 * @property int $update_time
 * @property int $create_by
 * @property int $update_by
 * @property \App\Model\Entity\SupplierDealingDetailManufacturer[] $supplier_dealing_detail_manufacturer
 */
class SupplierDealingDetail extends Entity
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
