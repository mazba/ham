<?php
namespace App\Model\Table;

use App\Model\Entity\OfficeBuilding;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OfficeBuildings Model
 */
class OfficeBuildingsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('office_buildings');
        $this->displayField('title_bn');
        $this->primaryKey('id');
        $this->belongsTo('ParentOfficeBuildings', [
            'className' => 'OfficeBuildings',
            'foreignKey' => 'parent_id'
        ]);
        $this->belongsTo('Offices', [
            'foreignKey' => 'office_id'
        ]);
        $this->hasMany('ItemAssigns', [
            'foreignKey' => 'office_building_id'
        ]);
        $this->hasMany('ChildOfficeBuildings', [
            'className' => 'OfficeBuildings',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('OfficeGarages', [
            'foreignKey' => 'office_building_id'
        ]);
        $this->hasMany('OfficeRooms', [
            'foreignKey' => 'office_building_id'
        ]);
        $this->hasMany('OfficeWarehouses', [
            'foreignKey' => 'office_building_id'
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
            ->allowEmpty('type');
            
        $validator
            ->allowEmpty('title_bn');
            
        $validator
            ->allowEmpty('title_en');
            
        $validator
            ->add('number_storeys', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('number_storeys');
            
        $validator
            ->allowEmpty('total_area');
            
        $validator
            ->allowEmpty('address');
            
        $validator
            ->add('number_room', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('number_room');
            
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
        $rules->add($rules->existsIn(['parent_id'], 'ParentOfficeBuildings'));
        $rules->add($rules->existsIn(['office_id'], 'Offices'));
        return $rules;
    }
}
