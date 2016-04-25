<?php
namespace App\Model\Table;

use App\Model\Entity\ItemVehicle;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ItemVehicles Model
 */
class ItemVehiclesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('item_vehicles');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Offices', [
            'foreignKey' => 'office_id'
        ]);
        $this->belongsTo('Items', [
            'foreignKey' => 'item_id'
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
            ->allowEmpty('registration_number');
            
        $validator
            ->allowEmpty('prefix_number');
            
        $validator
            ->allowEmpty('engine_number');
            
        $validator
            ->allowEmpty('chasis_number');
            
        $validator
            ->allowEmpty('country_of_origin');
            
        $validator
            ->add('fuel_tank_capacity', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('fuel_tank_capacity');
            
        $validator
            ->add('oil_sump_capacity', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('oil_sump_capacity');
            
        $validator
            ->add('load_capacity', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('load_capacity');
            
        $validator
            ->allowEmpty('engine_capacity');
            
        $validator
            ->allowEmpty('number_plate');
            
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
        $rules->add($rules->existsIn(['item_id'], 'Items'));
        return $rules;
    }
}
