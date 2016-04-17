<?php
namespace App\Model\Table;

use App\Model\Entity\OfficeWarehouse;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OfficeWarehouses Model
 */
class OfficeWarehousesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('office_warehouses');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('ParentOfficeWarehouses', [
            'className' => 'OfficeWarehouses',
            'foreignKey' => 'parent_id'
        ]);
        $this->belongsTo('Offices', [
            'foreignKey' => 'office_id'
        ]);
        $this->belongsTo('OfficeBuildings', [
            'foreignKey' => 'office_building_id'
        ]);
        $this->belongsTo('OfficeRooms', [
            'foreignKey' => 'office_room_id'
        ]);
        $this->hasMany('ItemAssigns', [
            'foreignKey' => 'office_warehouse_id'
        ]);
        $this->hasMany('ItemWithdrawals', [
            'foreignKey' => 'office_warehouse_id'
        ]);
        $this->hasMany('Items', [
            'foreignKey' => 'office_warehouse_id'
        ]);
        $this->hasMany('ChildOfficeWarehouses', [
            'className' => 'OfficeWarehouses',
            'foreignKey' => 'parent_id'
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
            ->allowEmpty('title_bn');
            
        $validator
            ->allowEmpty('title_en');
            
        $validator
            ->allowEmpty('size');
            
        $validator
            ->allowEmpty('description');
            
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
        $rules->add($rules->existsIn(['parent_id'], 'ParentOfficeWarehouses'));
        $rules->add($rules->existsIn(['office_id'], 'Offices'));
        $rules->add($rules->existsIn(['office_building_id'], 'OfficeBuildings'));
        $rules->add($rules->existsIn(['office_room_id'], 'OfficeRooms'));
        return $rules;
    }
}
