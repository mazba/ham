<?php
namespace App\Model\Table;

use App\Model\Entity\SupplierDealingDetail;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SupplierDealingDetails Model
 */
class SupplierDealingDetailsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('supplier_dealing_details');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Committees', [
            'foreignKey' => 'committee_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('ItemCategories', [
            'foreignKey' => 'item_category_id'
        ]);
        $this->hasMany('SupplierDealingDetailManufacturer', [
            'foreignKey' => 'supplier_dealing_detail_id'
        ]);
        $this->hasMany('SupplierDealingDetailOffice', [
            'foreignKey' => 'supplier_dealing_detail_id'
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
            ->allowEmpty('title_bn');
            
        $validator
            ->allowEmpty('title_en');
            
        $validator
            ->add('deal_start_date', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('deal_start_date');
            
        $validator
            ->add('deal_end_date', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('deal_end_date');
            
        $validator
            ->allowEmpty('deal_attach_file');
            
        $validator
            ->allowEmpty('deal_description');
            
        $validator
            ->allowEmpty('deal_remarks');
            
        $validator
            ->add('deal_duration', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('deal_duration');
            
        $validator
            ->add('actual_completion_duration', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('actual_completion_duration');
            
        $validator
            ->add('item_number', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('item_number');
            
        $validator
            ->add('security_amount', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('security_amount');
            
        $validator
            ->add('actual_deal_amount', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('actual_deal_amount');
            
        $validator
            ->add('penalty_amount', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('penalty_amount');
            
        $validator
            ->add('tax_amount', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('tax_amount');
            
        $validator
            ->add('vat_amount', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('vat_amount');
            
        $validator
            ->add('total_amount', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('total_amount');
            
        $validator
            ->add('billing_installment_number', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('billing_installment_number');
            
        $validator
            ->add('final_billing_date', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('final_billing_date');
            
        $validator
            ->add('actual_final_billing_date', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('actual_final_billing_date');
            
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
        $rules->add($rules->existsIn(['committee_id'], 'Committees'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['deal_type_id'], 'DealTypes'));
        $rules->add($rules->existsIn(['item_category_id'], 'ItemCategories'));
        return $rules;
    }
}
