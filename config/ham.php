<?php
/**
 * Created by PhpStorm.
 * User: Mazba
 * Date: 2/28/2016
 * Time: 11:27 AM
 */
return [
    'status_options' => [
        1 => 'Active',
        2 => 'In-Active'
    ],
    'supplier_type' => [
        1 => 'Individual ',
        2 => 'Proprietary',
        3 => 'Limited Firm',
        4 => 'Corporation',
        5 => 'International',
    ],
    'deal_type' => [
        1 => 'consultancy',
        2 => 'product',
        3 => 'service',
        4 => 'construction'
    ],

    'item_conditions' => [
        'Excellent' => 1,
        'Very Good' => 2,
        'Good' => 3,
        'Satisfy' => 4,
        'Poor' => 5
    ],

    'document_type' => [
        'License' => 1,
        'Agreement' => 2,
        'Purchase Order' => 3,
        'Requisition Order' => 4,
        'Other' => 5
    ],

    'depreciate_method' => [
        'Straight line method' => 1,
        'Declining balance method' => 2,
        'Sum of the years digits method' => 3,
        'Units of Activity Depreciation' => 4
    ]


];