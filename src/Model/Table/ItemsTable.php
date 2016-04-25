<?php
namespace App\Model\Table;

use ArrayObject;
use Cake\Event\Event;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Items Model
 */
class ItemsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('items');
        $this->displayField('title_bn');
        $this->primaryKey('id');
        $this->belongsTo('ParentItems', [
            'className' => 'Items',
            'foreignKey' => 'parent_id'
        ]);
        $this->belongsTo('Manufacturers', [
            'foreignKey' => 'manufacturer_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Suppliers', [
            'foreignKey' => 'supplier_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('AssetNatures', [
            'foreignKey' => 'asset_nature_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('AssetTypes', [
            'foreignKey' => 'asset_type_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ItemCategories', [
            'foreignKey' => 'item_category_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Offices', [
            'foreignKey' => 'office_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('OfficeWarehouses', [
            'foreignKey' => 'office_warehouse_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('ItemAssigns', [
            'foreignKey' => 'item_id'
        ]);
        $this->hasOne('ItemDepreciations', [
            'foreignKey' => 'item_id'
        ]);
        $this->hasOne('ItemDocuments', [
            'foreignKey' => 'item_id'
        ]);
        $this->hasMany('ItemMaintenanceHistories', [
            'foreignKey' => 'item_id'
        ]);
        $this->hasOne('ItemMaintenances', [
            'foreignKey' => 'item_id'
        ]);
        $this->hasMany('ItemVehicles', [
            'foreignKey' => 'item_id'
        ]);
        $this->hasMany('ChildItems', [
            'className' => 'Items',
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
            ->requirePresence('serial_number', 'create')
            ->notEmpty('serial_number');

        $validator
            ->requirePresence('office_serial_number', 'create')
            ->notEmpty('office_serial_number');

        $validator
            ->requirePresence('model_number', 'create')
            ->notEmpty('model_number');

        $validator
            ->requirePresence('code', 'create')
            ->notEmpty('code');

        $validator
            ->requirePresence('short_code', 'create')
            ->notEmpty('short_code');

        $validator
            ->requirePresence('title_bn', 'create')
            ->notEmpty('title_bn');

        $validator
            ->requirePresence('title_en', 'create')
            ->notEmpty('title_en');

        $validator
            ->add('unit_price', 'valid', ['rule' => 'numeric'])
            ->requirePresence('unit_price', 'create')
            ->notEmpty('unit_price');

        $validator
            ->add('quantity', 'valid', ['rule' => 'numeric'])
            ->requirePresence('quantity', 'create')
            ->notEmpty('quantity');

        $validator
            ->allowEmpty('description');

        $validator
            ->allowEmpty('picture_file');

        $validator
            ->add('condition', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('condition');

        $validator
            ->allowEmpty('purchase_order_number');

        $validator
            ->allowEmpty('purchase_order_attach_file');

        $validator
            ->requirePresence('office_stock_book_number', 'create')
            ->notEmpty('office_stock_book_number');

        $validator
            ->add('purchase_order_date', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('purchase_order_date');

        $validator
            ->add('office_receive_date', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('office_receive_date');

        $validator
            ->add('warranty_start_date', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('warranty_start_date');

        $validator
            ->add('warranty_end_date', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('warranty_end_date');

        $validator
            ->add('projected_end_of_life', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('projected_end_of_life');

        $validator
            ->add('is_depreciable', 'valid', ['rule' => 'boolean'])
            ->allowEmpty('is_depreciable');

        $validator
            ->add('is_maintainable', 'valid', ['rule' => 'boolean'])
            ->allowEmpty('is_maintainable');

        $validator
            ->allowEmpty('remarks');

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
        $rules->add($rules->existsIn(['parent_id'], 'ParentItems'));
        $rules->add($rules->existsIn(['manufacturer_id'], 'Manufacturers'));
        $rules->add($rules->existsIn(['supplier_id'], 'Suppliers'));
        $rules->add($rules->existsIn(['asset_nature_id'], 'AssetNatures'));
        $rules->add($rules->existsIn(['asset_type_id'], 'AssetTypes'));
        $rules->add($rules->existsIn(['item_category_id'], 'ItemCategories'));
        $rules->add($rules->existsIn(['office_id'], 'Offices'));
        $rules->add($rules->existsIn(['office_warehouse_id'], 'OfficeWarehouses'));
        return $rules;
    }

    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {
        if (isset($data['purchase_order_date'])) {
            $data['purchase_order_date'] = $data['purchase_order_date'] ? strtotime($data['purchase_order_date']) : 0;
        }
        if (isset($data['warranty_start_date'])) {
            $data['warranty_start_date'] = $data['warranty_start_date'] ? strtotime($data['warranty_start_date']) : 0;
        }
        if (isset($data['projected_end_of_life'])) {
            $data['projected_end_of_life'] = $data['projected_end_of_life'] ? strtotime($data['projected_end_of_life']) : 0;
        }
        if (isset($data['office_receive_date'])) {
            $data['office_receive_date'] = $data['office_receive_date'] ? strtotime($data['office_receive_date']) : 0;
        }
        if (isset($data['warranty_end_date'])) {
            $data['warranty_end_date'] = $data['warranty_end_date'] ? strtotime($data['warranty_end_date']) : 0;
        }

    }
}
