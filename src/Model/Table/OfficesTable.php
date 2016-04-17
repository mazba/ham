<?php
namespace App\Model\Table;

use App\Model\Entity\Office;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Offices Model
 *
 * @property \Cake\ORM\Association\BelongsTo $ParentOffices
 * @property \Cake\ORM\Association\BelongsTo $OfficeLevels
 * @property \Cake\ORM\Association\BelongsTo $AreaDivisions
 * @property \Cake\ORM\Association\BelongsTo $AreaZones
 * @property \Cake\ORM\Association\BelongsTo $AreaDistricts
 * @property \Cake\ORM\Association\BelongsTo $AreaUpazilas
 * @property \Cake\ORM\Association\HasMany $Committees
 * @property \Cake\ORM\Association\HasMany $Designations
 * @property \Cake\ORM\Association\HasMany $ItemAssigns
 * @property \Cake\ORM\Association\HasMany $ItemDepreciations
 * @property \Cake\ORM\Association\HasMany $ItemDocuments
 * @property \Cake\ORM\Association\HasMany $ItemMaintenanceHistories
 * @property \Cake\ORM\Association\HasMany $ItemMaintenances
 * @property \Cake\ORM\Association\HasMany $ItemVehicles
 * @property \Cake\ORM\Association\HasMany $ItemWithdrawals
 * @property \Cake\ORM\Association\HasMany $Items
 * @property \Cake\ORM\Association\HasMany $JobRanks
 * @property \Cake\ORM\Association\HasMany $OfficeBuildings
 * @property \Cake\ORM\Association\HasMany $OfficeGarages
 * @property \Cake\ORM\Association\HasMany $OfficeModuleSettings
 * @property \Cake\ORM\Association\HasMany $OfficeRooms
 * @property \Cake\ORM\Association\HasMany $OfficeUnitDesignations
 * @property \Cake\ORM\Association\HasMany $OfficeUnits
 * @property \Cake\ORM\Association\HasMany $OfficeWarehouses
 * @property \Cake\ORM\Association\HasMany $ChildOffices
 * @property \Cake\ORM\Association\HasMany $SupplierDealingDetails
 * @property \Cake\ORM\Association\HasMany $Suppliers
 * @property \Cake\ORM\Association\HasMany $UserActionHistories
 * @property \Cake\ORM\Association\HasMany $UserCommittees
 * @property \Cake\ORM\Association\HasMany $UserDesignations
 * @property \Cake\ORM\Association\HasMany $UserEmploymentHistories
 * @property \Cake\ORM\Association\HasMany $UserLeaves
 * @property \Cake\ORM\Association\HasMany $UserMedicals
 * @property \Cake\ORM\Association\HasMany $UserPayInformations
 * @property \Cake\ORM\Association\HasMany $UserPerformanceReports
 * @property \Cake\ORM\Association\HasMany $Users
 */
class OfficesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('offices');
        $this->displayField('name_en');
        $this->primaryKey('id');

        $this->belongsTo('ParentOffices', [
            'className' => 'Offices',
            'foreignKey' => 'parent_id'
        ]);
        $this->belongsTo('OfficeLevels', [
            'foreignKey' => 'office_level_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('AreaDivisions', [
            'foreignKey' => 'area_division_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('AreaZones', [
            'foreignKey' => 'area_zone_id'
        ]);
        $this->belongsTo('AreaDistricts', [
            'foreignKey' => 'area_district_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('AreaUpazilas', [
            'foreignKey' => 'area_upazila_id'
        ]);
        $this->hasMany('Committees', [
            'foreignKey' => 'office_id'
        ]);
        $this->hasMany('Designations', [
            'foreignKey' => 'office_id'
        ]);
        $this->hasMany('ItemAssigns', [
            'foreignKey' => 'office_id'
        ]);
        $this->hasMany('ItemDepreciations', [
            'foreignKey' => 'office_id'
        ]);
        $this->hasMany('ItemDocuments', [
            'foreignKey' => 'office_id'
        ]);
        $this->hasMany('ItemMaintenanceHistories', [
            'foreignKey' => 'office_id'
        ]);
        $this->hasMany('ItemMaintenances', [
            'foreignKey' => 'office_id'
        ]);
        $this->hasMany('ItemVehicles', [
            'foreignKey' => 'office_id'
        ]);
        $this->hasMany('ItemWithdrawals', [
            'foreignKey' => 'office_id'
        ]);
        $this->hasMany('Items', [
            'foreignKey' => 'office_id'
        ]);
        $this->hasMany('JobRanks', [
            'foreignKey' => 'office_id'
        ]);
        $this->hasMany('OfficeBuildings', [
            'foreignKey' => 'office_id'
        ]);
        $this->hasMany('OfficeGarages', [
            'foreignKey' => 'office_id'
        ]);
        $this->hasMany('OfficeModuleSettings', [
            'foreignKey' => 'office_id'
        ]);
        $this->hasMany('OfficeRooms', [
            'foreignKey' => 'office_id'
        ]);
        $this->hasMany('OfficeUnitDesignations', [
            'foreignKey' => 'office_id'
        ]);
        $this->hasMany('OfficeUnits', [
            'foreignKey' => 'office_id'
        ]);
        $this->hasMany('OfficeWarehouses', [
            'foreignKey' => 'office_id'
        ]);
        $this->hasMany('ChildOffices', [
            'className' => 'Offices',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('SupplierDealingDetails', [
            'foreignKey' => 'office_id'
        ]);
        $this->hasMany('Suppliers', [
            'foreignKey' => 'office_id'
        ]);
        $this->hasMany('UserActionHistories', [
            'foreignKey' => 'office_id'
        ]);
        $this->hasMany('UserCommittees', [
            'foreignKey' => 'office_id'
        ]);
        $this->hasMany('UserDesignations', [
            'foreignKey' => 'office_id'
        ]);
        $this->hasMany('UserEmploymentHistories', [
            'foreignKey' => 'office_id'
        ]);
        $this->hasMany('UserLeaves', [
            'foreignKey' => 'office_id'
        ]);
        $this->hasMany('UserMedicals', [
            'foreignKey' => 'office_id'
        ]);
        $this->hasMany('UserPayInformations', [
            'foreignKey' => 'office_id'
        ]);
        $this->hasMany('UserPerformanceReports', [
            'foreignKey' => 'office_id'
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'office_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('code');

        $validator
            ->requirePresence('name_bn', 'create')
            ->notEmpty('name_bn');

        $validator
            ->requirePresence('name_en', 'create')
            ->notEmpty('name_en');

        $validator
            ->allowEmpty('short_name_bn');

        $validator
            ->allowEmpty('short_name_en');

        $validator
            ->allowEmpty('digital_nothi_code');

        $validator
            ->allowEmpty('reference_code');

        $validator
            ->requirePresence('office_level_id', 'create')
            ->notEmpty('office_level_id');

        $validator
            ->requirePresence('area_division_id', 'create')
            ->notEmpty('area_division_id');

        $validator
            ->requirePresence('area_district_id', 'create')
            ->notEmpty('area_district_id');

        $validator
            ->allowEmpty('phone');

        $validator
            ->allowEmpty('mobile');

        $validator
            ->allowEmpty('fax');

        $validator
            ->add('email', 'valid', ['rule' => 'email'])
            ->allowEmpty('email');

        $validator
            ->allowEmpty('web_url');

        $validator
            ->allowEmpty('address');

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->add('status', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('status');

        $validator
            ->add('create_time', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('create_time');

        $validator
            ->add('update_time', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('update_time');

        $validator
            ->add('create_by', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('create_by');

        $validator
            ->add('update_by', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('update_by');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['parent_id'], 'ParentOffices'));
        $rules->add($rules->existsIn(['office_level_id'], 'OfficeLevels'));
        $rules->add($rules->existsIn(['area_division_id'], 'AreaDivisions'));
        $rules->add($rules->existsIn(['area_district_id'], 'AreaDistricts'));
        return $rules;
    }
}
