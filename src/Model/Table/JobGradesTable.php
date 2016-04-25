<?php
namespace App\Model\Table;

use App\Model\Entity\JobGrade;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * JobGrades Model
 */
class JobGradesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('job_grades');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('JobCadres', [
            'foreignKey' => 'job_cadre_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('JobRanks', [
            'foreignKey' => 'job_rank_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('UserPayInformations', [
            'foreignKey' => 'job_grade_id'
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
        $rules->add($rules->existsIn(['job_cadre_id'], 'JobCadres'));
        $rules->add($rules->existsIn(['job_rank_id'], 'JobRanks'));
        return $rules;
    }
}
