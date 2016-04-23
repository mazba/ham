<?php
namespace App\Model\Table;

use App\Model\Entity\ItemMaintenance;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ItemMaintenances Model
 */
class ItemMaintenancesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('item_maintenances');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Offices', [
            'foreignKey' => 'office_id'
        ]);
        $this->belongsTo('Suppliers', [
            'foreignKey' => 'supplier_id'
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
            ->add('total_maintenance_number', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('total_maintenance_number');
            
        $validator
            ->add('free_maintenance_number', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('free_maintenance_number');
            
        $validator
            ->add('free_maintenance_time_period', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('free_maintenance_time_period');
            
        $validator
            ->allowEmpty('maintenance_schedule');
            
        $validator
            ->add('each_maintenance_cost', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('each_maintenance_cost');
            
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
        $rules->add($rules->existsIn(['supplier_id'], 'Suppliers'));
        $rules->add($rules->existsIn(['item_id'], 'Items'));
        return $rules;
    }
}
