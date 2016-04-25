<?php
namespace App\Model\Table;

use App\Model\Entity\ItemWithdrawal;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ItemWithdrawals Model
 */
class ItemWithdrawalsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('item_withdrawals');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('ItemAssigns', [
            'foreignKey' => 'item_assign_id'
        ]);
        $this->belongsTo('Offices', [
            'foreignKey' => 'office_id'
        ]);
        $this->belongsTo('OfficeWarehouses', [
            'foreignKey' => 'office_warehouse_id'
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
            ->add('withdrawal_type', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('withdrawal_type');
            
        $validator
            ->add('withdrawal_time', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('withdrawal_time');
            
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
        $rules->add($rules->existsIn(['item_assign_id'], 'ItemAssigns'));
        $rules->add($rules->existsIn(['office_id'], 'Offices'));
        $rules->add($rules->existsIn(['office_warehouse_id'], 'OfficeWarehouses'));
        return $rules;
    }
}
