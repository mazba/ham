<?php
namespace App\Model\Table;

use App\Model\Entity\AreaZone;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AreaZones Model
 *
 * @property \Cake\ORM\Association\BelongsTo $AreaDivisions
 * @property \Cake\ORM\Association\HasMany $AreaDistricts
 * @property \Cake\ORM\Association\HasMany $AreaUpazilas
 * @property \Cake\ORM\Association\HasMany $Offices
 */
class AreaZonesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('area_zones');
        $this->displayField('name_bn');
        $this->primaryKey('id');

        $this->belongsTo('AreaDivisions', [
            'foreignKey' => 'area_division_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('AreaDistricts', [
            'foreignKey' => 'area_zone_id'
        ]);
        $this->hasMany('AreaUpazilas', [
            'foreignKey' => 'area_zone_id'
        ]);
        $this->hasMany('Offices', [
            'foreignKey' => 'area_zone_id'
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
            ->allowEmpty('id', 'create');

        $validator
            ->add('dglr_code', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('dglr_code');

        $validator
            ->allowEmpty('name_en');

        $validator
            ->requirePresence('name_bn', 'create')
            ->notEmpty('name_bn');

        $validator
            ->add('status', 'valid', ['rule' => 'numeric'])
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->add('created_by', 'valid', ['rule' => 'numeric'])
            ->requirePresence('created_by', 'create')
            ->notEmpty('created_by');

        $validator
            ->add('created_date', 'valid', ['rule' => 'numeric'])
            ->requirePresence('created_date', 'create')
            ->notEmpty('created_date');

        $validator
            ->add('updated_by', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('updated_by');

        $validator
            ->add('updated_date', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('updated_date');

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
        $rules->add($rules->existsIn(['area_division_id'], 'AreaDivisions'));
        return $rules;
    }
}
