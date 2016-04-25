<?php
namespace App\Model\Table;

use App\Model\Entity\UserBasic;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserBasics Model
 */
class UserBasicTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('user_basics');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
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

        $validator->requirePresence('father_name_bn', true)->notEmpty('father_name_bn', 'Please fill this field');
            
        $validator
            ->requirePresence('father_name_en', 'create')
            ->notEmpty('father_name_en');
            
        $validator
            ->requirePresence('mother_name_bn', 'create')
            ->notEmpty('mother_name_bn');
            
        $validator
            ->requirePresence('mother_name_en', 'create')
            ->notEmpty('mother_name_en');
            
        $validator
            ->allowEmpty('nid');
            
        $validator
            ->allowEmpty('bin_brn');
            
        $validator
            ->requirePresence('date_of_birth', 'create')
            ->notEmpty('date_of_birth');
            
        $validator
            ->allowEmpty('place_of_birth');
            
        $validator
            ->allowEmpty('nationality');
            
        $validator
            ->add('is_ethnic', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('is_ethnic');
            
        $validator
            ->add('is_disable', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('is_disable');
            
        $validator
            ->add('is_married', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('is_married');
            
        $validator
            ->allowEmpty('spouse_name_bn');
            
        $validator
            ->allowEmpty('spouse_name_en');
            
        $validator
            ->add('gender', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('gender');
            
        $validator
            ->add('religion', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('religion');
            
        $validator
            ->allowEmpty('home_phone');
            
        $validator
            ->allowEmpty('cell_phone');
            
        $validator
            ->add('email', 'valid', ['rule' => 'email'])
            ->allowEmpty('email');
            
        $validator
            ->allowEmpty('passport_number');
            
        $validator
            ->allowEmpty('driving_license_number');
            
        $validator
            ->allowEmpty('tin_number');
            
        $validator
            ->allowEmpty('present_address');
            
        $validator
            ->allowEmpty('permanent_address');
            
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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }
}
