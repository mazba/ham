<?php
namespace App\Model\Table;

use App\Model\Entity\OfficeUnit;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OfficeUnits Model
 */
class OfficeUnitsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('office_units');
        $this->displayField('name_bn');
        $this->primaryKey('id');
        $this->belongsTo('ParentOfficeUnits', [
            'className' => 'OfficeUnits',
            'foreignKey' => 'parent_id'
        ]);
        $this->belongsTo('OfficeLevels', [
            'foreignKey' => 'office_level_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('OfficeUnitCategories', [
            'foreignKey' => 'office_unit_category_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Offices', [
            'foreignKey' => 'office_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('ItemAssigns', [
            'foreignKey' => 'office_unit_id'
        ]);
        $this->hasMany('OfficeRooms', [
            'foreignKey' => 'office_unit_id'
        ]);
        $this->hasMany('OfficeUnitDesignations', [
            'foreignKey' => 'office_unit_id'
        ]);
        $this->hasMany('ChildOfficeUnits', [
            'className' => 'OfficeUnits',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('UserActionHistories', [
            'foreignKey' => 'office_unit_id'
        ]);
        $this->hasMany('UserDesignations', [
            'foreignKey' => 'office_unit_id'
        ]);
        $this->hasMany('UserEmploymentHistories', [
            'foreignKey' => 'office_unit_id'
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
            ->requirePresence('name_bn', 'create')
            ->notEmpty('name_bn');
            
        $validator
            ->requirePresence('name_en', 'create')
            ->notEmpty('name_en');
            
        $validator
            ->requirePresence('unit_nothi_code', 'create')
            ->notEmpty('unit_nothi_code');
            
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
        $rules->add($rules->existsIn(['parent_id'], 'ParentOfficeUnits'));
        $rules->add($rules->existsIn(['office_level_id'], 'OfficeLevels'));
        $rules->add($rules->existsIn(['office_unit_category_id'], 'OfficeUnitCategories'));
        $rules->add($rules->existsIn(['office_id'], 'Offices'));
        return $rules;
    }
}
