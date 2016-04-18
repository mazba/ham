<?php
namespace App\Model\Table;

use App\Model\Entity\OfficeLevel;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OfficeLevels Model
 */
class OfficeLevelsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('office_levels');
        $this->displayField('name_bn');
        $this->primaryKey('id');
        $this->belongsTo('ParentOfficeLevels', [
            'className' => 'OfficeLevels',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('ChildOfficeLevels', [
            'className' => 'OfficeLevels',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('OfficeUnits', [
            'foreignKey' => 'office_level_id'
        ]);
        $this->hasMany('Offices', [
            'foreignKey' => 'office_level_id'
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
            ->allowEmpty('name_bn');
            
        $validator
            ->allowEmpty('name_en');
            
        $validator
            ->add('level', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('level');
            
        $validator
            ->add('sequence', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('sequence');
            
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
        $rules->add($rules->existsIn(['parent_id'], 'ParentOfficeLevels'));
        return $rules;
    }
}
