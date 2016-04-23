<?php
namespace App\Model\Table;

use App\Model\Entity\ItemMaintenanceHistory;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ItemMaintenanceHistories Model
 */
class ItemMaintenanceHistoriesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('item_maintenance_histories');
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
            ->add('type', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('type');
            
        $validator
            ->add('start_date', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('start_date');
            
        $validator
            ->add('completion_date', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('completion_date');
            
        $validator
            ->add('warranty_covered', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('warranty_covered');
            
        $validator
            ->add('cost', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('cost');
            
        $validator
            ->allowEmpty('remarks');
            
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
