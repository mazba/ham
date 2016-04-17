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
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('ParentOffices', [
            'className' => 'Offices',
            'foreignKey' => 'parent_id'
        ]);
        $this->belongsTo('OfficeLevels', [
            'foreignKey' => 'office_level_id'
        ]);
        $this->belongsTo('AreaDivisions', [
            'foreignKey' => 'area_division_id'
        ]);
        $this->belongsTo('AreaZones', [
            'foreignKey' => 'area_zone_id'
        ]);
        $this->belongsTo('AreaDistricts', [
            'foreignKey' => 'area_district_id'
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
            ->allowEmpty('name_bn');

        $validator
            ->allowEmpty('name_en');

        $validator
            ->allowEmpty('short_name_bn');

        $validator
            ->allowEmpty('short_name_en');

        $validator
            ->allowEmpty('digital_nothi_code');

        $validator
            ->allowEmpty('reference_code');

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
        $rules->add($rules->existsIn(['area_zone_id'], 'AreaZones'));
        $rules->add($rules->existsIn(['area_district_id'], 'AreaDistricts'));
        $rules->add($rules->existsIn(['area_upazila_id'], 'AreaUpazilas'));
        return $rules;
    }
}
