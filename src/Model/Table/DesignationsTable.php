<?php
namespace App\Model\Table;

use App\Model\Entity\Designation;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Designations Model
 */
class DesignationsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('designations');
        $this->displayField('name_bn');
        $this->primaryKey('id');
        $this->belongsTo('ParentDesignations', [
            'className' => 'Designations',
            'foreignKey' => 'parent_id'
        ]);
        $this->belongsTo('Offices', [
            'foreignKey' => 'office_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('OfficeUnitDesignations', [
            'foreignKey' => 'office_unit_designation_id'
        ]);
        $this->hasMany('ChildDesignations', [
            'className' => 'Designations',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('ItemAssigns', [
            'foreignKey' => 'designation_id'
        ]);
        $this->hasMany('UserEmploymentHistories', [
            'foreignKey' => 'designation_id'
        ]);
        $this->hasMany('UserPerformanceReports', [
            'foreignKey' => 'designation_id'
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
            ->requirePresence('name_en', 'create')
            ->notEmpty('name_en');
            
        $validator
            ->requirePresence('name_bn', 'create')
            ->notEmpty('name_bn');
            
        $validator
            ->add('level_number', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('level_number');
            
        $validator
            ->add('sequence_number', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('sequence_number');
            
        $validator
            ->add('post_number', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('post_number');
            
        $validator
            ->add('status', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('status');
            
        $validator
            ->add('create_by', 'valid', ['rule' => 'numeric'])
            ->requirePresence('create_by', 'create')
            ->notEmpty('create_by');
            
        $validator
            ->add('create_date', 'valid', ['rule' => 'numeric'])
            ->requirePresence('create_date', 'create')
            ->notEmpty('create_date');
            
        $validator
            ->add('update_by', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('update_by');
            
        $validator
            ->add('update_date', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('update_date');

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
        $rules->add($rules->existsIn(['parent_id'], 'ParentDesignations'));
        $rules->add($rules->existsIn(['office_id'], 'Offices'));
        $rules->add($rules->existsIn(['office_unit_designation_id'], 'OfficeUnitDesignations'));
        return $rules;
    }
}
