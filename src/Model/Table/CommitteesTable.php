<?php
namespace App\Model\Table;

use App\Model\Entity\Committee;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Committees Model
 */
class CommitteesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('committees');
        $this->displayField('name_bn');
        $this->primaryKey('id');
        $this->belongsTo('ParentCommittees', [
            'className' => 'Committees',
            'foreignKey' => 'parent_id'
        ]);
        $this->belongsTo('Offices', [
            'foreignKey' => 'office_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('ChildCommittees', [
            'className' => 'Committees',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('SupplierDealingDetails', [
            'foreignKey' => 'committee_id'
        ]);
        $this->addBehavior('FileUpload',['upload_path'=>'u_load/committee','field'=>'attached_file']);
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
            ->requirePresence('name_bn', 'create')
            ->notEmpty('name_bn');
            
        $validator
            ->requirePresence('name_en', 'create')
            ->notEmpty('name_en');
            
        $validator
            ->add('member_size', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('member_size');
            
        $validator
            ->allowEmpty('agenda');
            
        $validator
            ->allowEmpty('description');
            
        $validator
            ->allowEmpty('decision');
            
        $validator
            ->add('start_date', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('start_date');
            
        $validator
            ->add('end_date', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('end_date');
            
        $validator
            ->allowEmpty('attached_file');
            
        $validator
            ->add('status', 'valid', ['rule' => 'numeric'])
            ->requirePresence('status', 'create')
            ->notEmpty('status');

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
        $rules->add($rules->existsIn(['parent_id'], 'ParentCommittees'));
        $rules->add($rules->existsIn(['office_id'], 'Offices'));
        return $rules;
    }
}
