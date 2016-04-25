<?php
namespace App\Model\Table;

use App\Model\Entity\ItemDepreciation;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ItemDepreciations Model
 */
class ItemDepreciationsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('item_depreciations');
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
            ->add('basic_cost', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('basic_cost');
            
        $validator
            ->add('method', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('method');
            
        $validator
            ->add('annual_rate', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('annual_rate');
            
        $validator
            ->add('salvage_value', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('salvage_value');
            
        $validator
            ->add('lifetime', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('lifetime');
            
        $validator
            ->add('item_use_start_time', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('item_use_start_time');
            
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
