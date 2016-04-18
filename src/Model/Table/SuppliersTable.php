<?php
namespace App\Model\Table;

use App\Model\Entity\Supplier;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Suppliers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $ParentSuppliers
 * @property \Cake\ORM\Association\BelongsTo $Offices
 * @property \Cake\ORM\Association\HasMany $ItemMaintenanceHistories
 * @property \Cake\ORM\Association\HasMany $ItemMaintenances
 * @property \Cake\ORM\Association\HasMany $Items
 * @property \Cake\ORM\Association\HasMany $SupplierDealingDetails
 * @property \Cake\ORM\Association\HasMany $ChildSuppliers
 */
class SuppliersTable extends Table
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

        $this->table('suppliers');
        $this->displayField('name_bn');
        $this->primaryKey('id');

        $this->belongsTo('ParentSuppliers', [
            'className' => 'Suppliers',
            'foreignKey' => 'parent_id'
        ]);
        $this->belongsTo('Offices', [
            'foreignKey' => 'office_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('ItemMaintenanceHistories', [
            'foreignKey' => 'supplier_id'
        ]);
        $this->hasMany('ItemMaintenances', [
            'foreignKey' => 'supplier_id'
        ]);
        $this->hasMany('Items', [
            'foreignKey' => 'supplier_id'
        ]);
        $this->hasMany('SupplierDealingDetails', [
            'foreignKey' => 'supplier_id'
        ]);
        $this->hasMany('ChildSuppliers', [
            'className' => 'Suppliers',
            'foreignKey' => 'parent_id'
        ]);
        $this->addBehavior('FileUpload',['upload_path'=>'u_load/supplier_agreement','field'=>'agreement_attach_file']);
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
            ->add('is_global', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('is_global');

        $validator
            ->allowEmpty('code');

        $validator
            ->add('type', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('type');

        $validator
            ->requirePresence('name_bn', 'create')
            ->notEmpty('name_bn');

        $validator
            ->requirePresence('name_en', 'create')
            ->notEmpty('name_en');

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
            ->allowEmpty('post_code');

        $validator
            ->allowEmpty('city');

        $validator
            ->allowEmpty('state');

        $validator
            ->allowEmpty('country');

        $validator
            ->allowEmpty('contact_address');

        $validator
            ->allowEmpty('billing_address');

        $validator
            ->requirePresence('contact_person_name', 'create')
            ->notEmpty('contact_person_name');

        $validator
            ->allowEmpty('contact_person_designation');

        $validator
            ->requirePresence('contact_person_cell_number', 'create')
            ->notEmpty('contact_person_cell_number');

        $validator
            ->allowEmpty('contact_person_email');

        $validator
            ->allowEmpty('supplier_major_sector');

        $validator
            ->allowEmpty('supplier_major_product_tag');

        $validator
            ->add('agreement_attach_file', 'valid', ['rule' => ['mimeType', ['image/jpeg', 'image/png','application/msword','application/vnd.ms-excel','application/vnd.ms-powerpoint','application/vnd.oasis.opendocument.text','application/vnd.oasis.opendocument.spreadsheet','application/pdf']]])
            ->allowEmpty('agreement_attach_file');

        $validator
            ->add('agreement_duration', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('agreement_duration');

        $validator
            ->allowEmpty('description');

        $validator
            ->allowEmpty('remarks');

        $validator
            ->add('status', 'valid', ['rule' => 'numeric'])
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->add('create_time', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('create_time');

        $validator
            ->add('update_time', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('update_time');

        $validator
            ->add('create_by', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('create_by');

        $validator
            ->add('update_by', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('update_by');

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
        $rules->add($rules->existsIn(['parent_id'], 'ParentSuppliers'));
        $rules->add($rules->existsIn(['office_id'], 'Offices'));
        return $rules;
    }
}
