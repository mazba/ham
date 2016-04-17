<?php
namespace App\Model\Table;

use App\Model\Entity\AssetNature;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AssetNatures Model
 */
class AssetNaturesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('asset_natures');
        $this->displayField('title_bn');
        $this->primaryKey('id');
        $this->belongsTo('ParentAssetNatures', [
            'className' => 'AssetNatures',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('ChildAssetNatures', [
            'className' => 'AssetNatures',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('Items', [
            'foreignKey' => 'asset_nature_id'
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
            ->allowEmpty('description');
            
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
        $rules->add($rules->existsIn(['parent_id'], 'ParentAssetNatures'));
        return $rules;
    }
}
