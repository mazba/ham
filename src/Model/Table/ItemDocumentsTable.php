<?php
namespace App\Model\Table;

use ArrayObject;
use Cake\Event\Event;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ItemDocuments Model
 */
class ItemDocumentsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('item_documents');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('ParentItemDocuments', [
            'className' => 'ItemDocuments',
            'foreignKey' => 'parent_id'
        ]);
        $this->belongsTo('Offices', [
            'foreignKey' => 'office_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Items', [
            'foreignKey' => 'item_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('ChildItemDocuments', [
            'className' => 'ItemDocuments',
            'foreignKey' => 'parent_id'
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
            ->add('document_type', 'valid', ['rule' => 'numeric'])
            ->requirePresence('document_type', 'create')
            ->notEmpty('document_type');

        $validator
            ->requirePresence('responsible_name', 'create')
            ->notEmpty('responsible_name');

        $validator
            ->allowEmpty('responsible_email');

        $validator
            ->add('valid_number_or_duration', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('valid_number_or_duration');

        $validator
            ->add('is_reassignable', 'valid', ['rule' => 'boolean'])
            ->allowEmpty('is_reassignable');

        $validator
            ->add('is_auto_renewal', 'valid', ['rule' => 'boolean'])
            ->allowEmpty('is_auto_renewal');

        $validator
            ->add('effective_date', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('effective_date');

        $validator
            ->add('expire_date', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('expire_date');

        $validator
            ->allowEmpty('remarks');

        $validator
            ->requirePresence('attach_file', 'create')
            ->notEmpty('attach_file');

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
        $rules->add($rules->existsIn(['parent_id'], 'ParentItemDocuments'));
        $rules->add($rules->existsIn(['office_id'], 'Offices'));
        $rules->add($rules->existsIn(['item_id'], 'Items'));
        return $rules;
    }

    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {
        if (isset($data['effective_date'])) {
            $data['effective_date'] = $data['effective_date'] ? strtotime($data['effective_date']) : 0;
        }
        if (isset($data['expire_date'])) {
            $data['expire_date'] = $data['expire_date'] ? strtotime($data['expire_date']) : 0;
        }
    }
}
