<?php
namespace App\Model\Table;

use App\Model\Entity\Manufacturer;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Manufacturers Model
 */
class ManufacturersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('manufacturers');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->hasMany('Items', [
            'foreignKey' => 'manufacturer_id'
        ]);
        $this->hasMany('SupplierDealingDetails', [
            'foreignKey' => 'manufacturer_id'
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
            ->allowEmpty('name_bn');
            
        $validator
            ->allowEmpty('name_en');
            
        $validator
            ->allowEmpty('phone');
            
        $validator
            ->allowEmpty('fax');
            
        $validator
            ->allowEmpty('website');
            
        $validator
            ->add('email', 'valid', ['rule' => 'email'])
            ->allowEmpty('email');
            
        $validator
            ->allowEmpty('cell_phone');
            
        $validator
            ->allowEmpty('country');
            
        $validator
            ->allowEmpty('address');
            
        $validator
            ->allowEmpty('major_sector');
            
        $validator
            ->allowEmpty('major_product_tag');
            
        $validator
            ->allowEmpty('description');
            
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
        $rules->add($rules->isUnique(['email']));
        return $rules;
    }
}
