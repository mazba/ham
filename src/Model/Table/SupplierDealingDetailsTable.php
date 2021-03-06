<?php
namespace App\Model\Table;

use App\Model\Entity\SupplierDealingDetail;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SupplierDealingDetails Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Committees
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $DealTypes
 * @property \Cake\ORM\Association\BelongsTo $ItemCategories
 * @property \Cake\ORM\Association\HasMany $SupplierDealingDetailManufacturer
 * @property \Cake\ORM\Association\HasMany $SupplierDealingDetailOffice
 */
class SupplierDealingDetailsTable extends Table
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

        $this->table('supplier_dealing_details');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Committees', [
            'foreignKey' => 'committee_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('ItemCategories', [
            'foreignKey' => 'item_category_id'
        ]);
        $this->belongsToMany('Manufacturers', [
            'joinTable' => 'supplier_dealing_detail_manufacturer',
            'foreignKey' => 'supplier_dealing_detail_id'
        ]);
        $this->belongsToMany('Offices', [
            'joinTable' => 'supplier_dealing_detail_office',
            'foreignKey' => 'supplier_dealing_detail_id'
        ]);
//        $this->addBehavior('FileUpload',['upload_path'=>'u_load/supplier_agreement','field'=>'agreement_attach_file']);
        $this->addBehavior('Xety/Cake3Upload.Upload', [
                'fields' => [
                    'deal_attach' => [
                        'path' => 'u_load/supplier_agreement/:md5'
                    ]
                ]
            ]
        );
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
            ->requirePresence('title_bn', 'create')
            ->notEmpty('title_bn');

        $validator
            ->requirePresence('title_en', 'create')
            ->notEmpty('title_en');

        $validator
            ->add('deal_start_date', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('deal_start_date');

        $validator
            ->add('deal_end_date', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('deal_end_date');

        $validator
            ->add('deal_attach_file', 'valid', ['rule' => ['mimeType', ['image/jpeg', 'image/png','application/msword','application/vnd.ms-excel','application/vnd.ms-powerpoint','application/vnd.oasis.opendocument.text','application/vnd.oasis.opendocument.spreadsheet','application/pdf']]])
            ->allowEmpty('deal_attach_file');

        $validator
            ->allowEmpty('deal_description');

        $validator
            ->allowEmpty('deal_remarks');

        $validator
            ->add('deal_duration', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('deal_duration');

        $validator
            ->add('actual_completion_duration', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('actual_completion_duration');

        $validator
            ->add('item_number', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('item_number');

        $validator
            ->add('security_amount', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('security_amount');

        $validator
            ->add('actual_deal_amount', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('actual_deal_amount');

        $validator
            ->add('penalty_amount', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('penalty_amount');

        $validator
            ->add('tax_amount', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('tax_amount');

        $validator
            ->add('vat_amount', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('vat_amount');

        $validator
            ->add('total_amount', 'valid', ['rule' => 'numeric'])
            ->requirePresence('total_amount', 'create')
            ->notEmpty('total_amount');

        $validator
            ->add('billing_installment_number', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('billing_installment_number');

        $validator
            ->add('final_billing_date', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('final_billing_date');

        $validator
            ->add('actual_final_billing_date', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('actual_final_billing_date');

        $validator
            ->add('status', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('status');

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
        $rules->add($rules->existsIn(['committee_id'], 'Committees'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['item_category_id'], 'ItemCategories'));
        return $rules;
    }
}
