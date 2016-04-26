<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Item Entity.
 *
 * @property int $id
 * @property int $parent_id
 * @property \App\Model\Entity\Item $parent_item
 * @property string $serial_number
 * @property string $office_serial_number
 * @property string $model_number
 * @property string $code
 * @property string $short_code
 * @property int $manufacturer_id
 * @property \App\Model\Entity\Manufacturer $manufacturer
 * @property int $supplier_id
 * @property \App\Model\Entity\Supplier $supplier
 * @property int $asset_nature_id
 * @property \App\Model\Entity\AssetNature $asset_nature
 * @property int $asset_type_id
 * @property \App\Model\Entity\AssetType $asset_type
 * @property int $item_category_id
 * @property \App\Model\Entity\ItemCategory $item_category
 * @property int $office_id
 * @property \App\Model\Entity\Office $office
 * @property int $office_warehouse_id
 * @property \App\Model\Entity\OfficeWarehouse $office_warehouse
 * @property string $title_bn
 * @property string $title_en
 * @property float $unit_price
 * @property float $quantity
 * @property string $description
 * @property string $picture_file
 * @property int $condition
 * @property string $purchase_order_number
 * @property string $purchase_order_attach_file
 * @property string $office_stock_book_number
 * @property int $purchase_order_date
 * @property int $office_receive_date
 * @property int $warranty_start_date
 * @property int $warranty_end_date
 * @property int $projected_end_of_life
 * @property bool $is_depreciable
 * @property bool $is_maintainable
 * @property string $remarks
 * @property int $status
 * @property int $create_time
 * @property int $update_time
 * @property int $create_by
 * @property int $update_by
 * @property \App\Model\Entity\ItemAssign[] $item_assigns
 * @property \App\Model\Entity\ItemDepreciation[] $item_depreciations
 * @property \App\Model\Entity\ItemDocument[] $item_documents
 * @property \App\Model\Entity\ItemMaintenanceHistory[] $item_maintenance_histories
 * @property \App\Model\Entity\ItemMaintenance[] $item_maintenances
 * @property \App\Model\Entity\ItemVehicle[] $item_vehicles
 * @property \App\Model\Entity\Item[] $child_items
 */
class Item extends Entity
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
    protected function _getFormattedPurchaseOrderDate(){
        return $this->purchase_order_date?date('d-m-Y',$this->purchase_order_date):'';
    }
    protected function _getFormattedOfficeReceiveDate(){
        return $this->office_receive_date?date('d-m-Y',$this->office_receive_date):'';
    }
    protected function _getFormattedWarrantyEndDate(){
        return $this->warranty_end_date?date('d-m-Y',$this->warranty_end_date):'';
    }
    protected function _getFormattedWarrantyStartDate(){
        return $this->warranty_start_date?date('d-m-Y',$this->warranty_start_date):'';
    }
    protected function _getFormattedProjectedEndOfLife(){
        return $this->projected_end_of_life?date('d-m-Y',$this->projected_end_of_life):'';
    }

}
