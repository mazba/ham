<?php
namespace App\Model\Table;

use App\Model\Entity\OfficeRoom;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OfficeRooms Model
 */
class OfficeRoomsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('office_rooms');
        $this->displayField('title_bn');
        $this->primaryKey('id');
        $this->belongsTo('ParentOfficeRooms', [
            'className' => 'OfficeRooms',
            'foreignKey' => 'parent_id'
        ]);
        $this->belongsTo('Offices', [
            'foreignKey' => 'office_id'
        ]);
        $this->belongsTo('OfficeBuildings', [
            'foreignKey' => 'office_building_id'
        ]);
        $this->belongsTo('OfficeUnits', [
            'foreignKey' => 'office_unit_id'
        ]);
        $this->hasMany('ItemAssigns', [
            'foreignKey' => 'office_room_id'
        ]);
        $this->hasMany('OfficeGarages', [
            'foreignKey' => 'office_room_id'
        ]);
        $this->hasMany('ChildOfficeRooms', [
            'className' => 'OfficeRooms',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('OfficeWarehouses', [
            'foreignKey' => 'office_room_id'
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
            ->add('floor_number', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('floor_number');
            
        $validator
            ->allowEmpty('title_bn');
            
        $validator
            ->allowEmpty('title_en');
            
        $validator
            ->add('number', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('number');
            
        $validator
            ->allowEmpty('size');
            
        $validator
            ->add('common_use', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('common_use');
            
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
        $rules->add($rules->existsIn(['parent_id'], 'ParentOfficeRooms'));
        $rules->add($rules->existsIn(['office_id'], 'Offices'));
        $rules->add($rules->existsIn(['office_building_id'], 'OfficeBuildings'));
        $rules->add($rules->existsIn(['office_unit_id'], 'OfficeUnits'));
        return $rules;
    }
}
