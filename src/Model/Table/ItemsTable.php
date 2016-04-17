<?php
namespace App\Model\Table;

use App\Model\Entity\Item;
use Cake\ORM\Query;
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
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('ParentItems', [
            'className' => 'Items',
            'foreignKey' => 'parent_id'
        ]);
        $this->belongsTo('Manufacturers', [
            'foreignKey' => 'manufacturer_id'
        ]);
        $this->belongsTo('Suppliers', [
            'foreignKey' => 'supplier_id'
        ]);
        $this->belongsTo('AssetNatures', [
            'foreignKey' => 'asset_nature_id'
        ]);
        $this->belongsTo('AssetTypes', [
            'foreignKey' => 'asset_type_id'
        ]);
        $this->belongsTo('ItemCategories', [
            'foreignKey' => 'item_category_id'
        ]);
        $this->belongsTo('Offices', [
            'foreignKey' => 'office_id'
        ]);
        $this->belongsTo('OfficeWarehouses', [
            'foreignKey' => 'office_warehouse_id'
        ]);
        $this->hasMany('ItemAssigns', [
            'foreignKey' => 'item_id'
        ]);
        $this->hasMany('ItemDepreciations', [
            'foreignKey' => 'item_id'
        ]);
        $this->hasMany('ItemDocuments', [
            'foreignKey' => 'item_id'
        ]);
        $this->hasMany('ItemMaintenanceHistories', [
            'foreignKey' => 'item_id'
        ]);
        $this->hasMany('ItemMaintenances', [
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
            ->allowEmpty('serial_number');
            
        $validator
            ->allowEmpty('office_serial_number');
            
        $validator
            ->allowEmpty('model_number');
            
        $validator
            ->allowEmpty('code');
            
        $validator
            ->allowEmpty('short_code');
            
        $validator
            ->allowEmpty('title_bn');
            
        $validator
            ->allowEmpty('title_en');
            
        $validator
            ->add('unit_price', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('unit_price');
            
        $validator
            ->add('quantity', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('quantity');
            
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
            ->allowEmpty('office_stock_book_number');
            
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
}
