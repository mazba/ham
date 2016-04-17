<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Office Entity.
 *
 * @property int $id
 * @property int $parent_id
 * @property \App\Model\Entity\ParentOffice $parent_office
 * @property string $code
 * @property int $office_level_id
 * @property \App\Model\Entity\OfficeLevel $office_level
 * @property string $name_bn
 * @property string $name_en
 * @property string $short_name_bn
 * @property string $short_name_en
 * @property string $digital_nothi_code
 * @property string $reference_code
 * @property string $area_division_id
 * @property \App\Model\Entity\AreaDivision $area_division
 * @property string $area_zone_id
 * @property \App\Model\Entity\AreaZone $area_zone
 * @property string $area_district_id
 * @property \App\Model\Entity\AreaDistrict $area_district
 * @property int $area_upazila_id
 * @property \App\Model\Entity\AreaUpazila $area_upazila
 * @property string $phone
 * @property string $mobile
 * @property string $fax
 * @property string $email
 * @property string $web_url
 * @property string $address
 * @property string $description
 * @property int $status
 * @property int $create_time
 * @property int $update_time
 * @property int $create_by
 * @property int $update_by
 * @property \App\Model\Entity\Committee[] $committees
 * @property \App\Model\Entity\Designation[] $designations
 * @property \App\Model\Entity\ItemAssign[] $item_assigns
 * @property \App\Model\Entity\ItemDepreciation[] $item_depreciations
 * @property \App\Model\Entity\ItemDocument[] $item_documents
 * @property \App\Model\Entity\ItemMaintenanceHistory[] $item_maintenance_histories
 * @property \App\Model\Entity\ItemMaintenance[] $item_maintenances
 * @property \App\Model\Entity\ItemVehicle[] $item_vehicles
 * @property \App\Model\Entity\ItemWithdrawal[] $item_withdrawals
 * @property \App\Model\Entity\Item[] $items
 * @property \App\Model\Entity\JobRank[] $job_ranks
 * @property \App\Model\Entity\OfficeBuilding[] $office_buildings
 * @property \App\Model\Entity\OfficeGarage[] $office_garages
 * @property \App\Model\Entity\OfficeModuleSetting[] $office_module_settings
 * @property \App\Model\Entity\OfficeRoom[] $office_rooms
 * @property \App\Model\Entity\OfficeUnitDesignation[] $office_unit_designations
 * @property \App\Model\Entity\OfficeUnit[] $office_units
 * @property \App\Model\Entity\OfficeWarehouse[] $office_warehouses
 * @property \App\Model\Entity\ChildOffice[] $child_offices
 * @property \App\Model\Entity\SupplierDealingDetail[] $supplier_dealing_details
 * @property \App\Model\Entity\Supplier[] $suppliers
 * @property \App\Model\Entity\UserActionHistory[] $user_action_histories
 * @property \App\Model\Entity\UserCommittee[] $user_committees
 * @property \App\Model\Entity\UserDesignation[] $user_designations
 * @property \App\Model\Entity\UserEmploymentHistory[] $user_employment_histories
 * @property \App\Model\Entity\UserLeave[] $user_leaves
 * @property \App\Model\Entity\UserMedical[] $user_medicals
 * @property \App\Model\Entity\UserPayInformation[] $user_pay_informations
 * @property \App\Model\Entity\UserPerformanceReport[] $user_performance_reports
 * @property \App\Model\Entity\User[] $users
 */
class Office extends Entity
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
