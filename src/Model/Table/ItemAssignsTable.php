<?php
namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ItemAssigns Model
 */
class ItemAssignsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('item_assigns');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Offices', [
            'foreignKey' => 'office_id'
        ]);
        $this->belongsTo('OfficeBuildings', [
            'foreignKey' => 'office_building_id'
        ]);
        $this->belongsTo('OfficeRooms', [
            'foreignKey' => 'office_room_id'
        ]);
        $this->belongsTo('OfficeWarehouses', [
            'foreignKey' => 'office_warehouse_id'
        ]);
        $this->belongsTo('OfficeUnits', [
            'foreignKey' => 'office_unit_id'
        ]);
        $this->belongsTo('Designations', [
            'foreignKey' => 'designation_id'
        ]);
        $this->belongsTo('DesignatedUsers', [
            'className' => 'Users',
            'foreignKey' => 'designated_user_id'
        ]);
        $this->belongsTo('Items', [
            'foreignKey' => 'item_id'
        ]);
        $this->hasMany('ItemWithdrawals', [
            'foreignKey' => 'item_assign_id'
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
            ->add('assign_type', 'valid', ['rule' => 'numeric'])
            ->requirePresence('assign_type', 'create')
            ->notEmpty('assign_type');

        $validator
            ->add('quantity', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('quantity');

        $validator
            ->add('assign_date', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('assign_date');

        $validator
            ->add('expected_usage_time', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('expected_usage_time');

        $validator
            ->allowEmpty('usage_instruction');

        $validator
            ->add('next_maintainance_date', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('next_maintainance_date');

        $validator
            ->add('status', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('status');

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
        $rules->add($rules->existsIn(['office_id'], 'Offices'));
        $rules->add($rules->existsIn(['office_building_id'], 'OfficeBuildings'));
        $rules->add($rules->existsIn(['office_room_id'], 'OfficeRooms'));
        $rules->add($rules->existsIn(['office_warehouse_id'], 'OfficeWarehouses'));
        $rules->add($rules->existsIn(['office_unit_id'], 'OfficeUnits'));
        $rules->add($rules->existsIn(['designation_id'], 'Designations'));
        $rules->add($rules->existsIn(['designated_user_id'], 'DesignatedUsers'));
        $rules->add($rules->existsIn(['item_id'], 'Items'));
        return $rules;
    }
}
