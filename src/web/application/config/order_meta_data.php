<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 |-------------------------------------------------------------------
| A - Administrator
| N - Normal User
| V - Viewer
|-------------------------------------------------------------------
*/
$all_field = array(
		'account',
		'market',
		'transactionID',
		'listID',
		'salesrecord',
		'epid',
		'catNum',
		'catName',
		'isbn10',
		'isbn13',
		'upc',
		'asin',
		'title',
		'salePrice',
		'quantity',
		'saleTime',
		'globalSale',
		'buyerID',
		'buyerName',
		'buyerEmail',
		'buyerAddr1',
		'buyerAddr2',
		'buyerCity',
		'buyerState',
		'buyerCountry',
		'buyerPhone',
		'sellNote',
		'orderStatus',
		'cost',
		'email',
		'creditcard',
		'orderNum',
		'source',
		'tax',
		'returnStatus',
		'buyerRefund',
		'sellerRefund',
		'lastUpdated',
		'srLink',
		'paidStatus',
		'buyerZip',
		'carrier',
		'trackingNum',
		'poLine',
		'paypalTnxnID',
		'shippingCost',
);

$config['query_conditions_field_names'] = array(
		'transactionID',
		'salesrecord',
		'buyerID',
		'buyerName'
);

$config['summary_field_names'] = array(
		'account',
		'market',
		'transactionID',
		'listID',
		'paypalTnxnID',
		'buyerID',
		'buyerName',
		'orderStatus',
		'cost',
		'email',
		'creditcard',
		'orderNum',
		'source',
		'tax',
		'returnStatus',
		'buyerRefund',
		'sellerRefund',
		'carrier',
		'trackingNum',
);

$config['order_actions'] = array(
		'update_return' => array(
				'name' => 'update_return',
				'label' => 'Process Return',
				'type' => 'update',
				'roles' => array('A', 'N'),
				'editable_fields' => array('buyerRefund', 'sellerRefund'),
				'read_only_fields' => $config['summary_field_names'],
		),
		'update_purchase' => array(
				'name' => 'update_purchase',
				'label' => 'Update Purchase Order',
				'type' => 'update',
				'roles' => array('A', 'N'),
				'editable_fields' => array('orderStatus', 'cost', 'email', 'creditcard', 'orderNum', 'source', 'tax'),
				'read_only_fields' => $config['summary_field_names'],
		),
		'update_tracking' => array(
				'name' => 'update_tracking',
				'label' => 'Update Tracking Number',
				'type' => 'update',
				'roles' => array('A', 'N'),
				'editable_fields' => array('carrier', 'trackingNum'),
				'read_only_fields' => $config['summary_field_names'],
		),
		'update_all' => array(
				'name' => 'update_all',
				'label' => 'Super Modify',
				'type' => 'update',
				'roles' => array('A'),
				'editable_fields' => $all_field,
				'read_only_fields' => array(),
		),
		'view' => array(
				'name' => 'view',
				'label' => 'View Order Information',
				'type' => 'update',
				'roles' => array('A', 'N', 'V'),
				'editable_fields' => array(),
				'read_only_fields' => $all_field,
		),
		'create_pruchase' => array(
				'name' => 'create_pruchase',
				'label' => 'Create Purchase Order',
				'type' => 'create',
				'roles' => array('A', 'N', 'V'),
				'editable_fields' => array(
						'orderStatus',
						'cost',
						'email',
						'creditcard',
						'orderNum',
						'source',
						'tax'),
				'read_only_fields' => array(
						'account',
						'market',
						'transactionID',
						'listID',
						'salesrecord',
						'epid',
						'catNum',
						'catName',
						'isbn10',
						'isbn13',
						'upc',
						'asin',
						'title',
						'salePrice',
						'quantity',
						'saleTime',
						'globalSale',
						'buyerID',
						'buyerName',
						'buyerEmail',
						'buyerAddr1',
						'buyerAddr2',
						'buyerCity',
						'buyerState',
						'buyerCountry',
						'buyerPhone',
						'sellNote',
						'returnStatus',
						'buyerRefund',
						'sellerRefund',
						'lastUpdated',
						'srLink',
						'paidStatus',
						'buyerZip',
						'carrier',
						'trackingNum',
						'poLine',
						'paypalTnxnID',
						'shippingCost',
				),
				'callback_method_init' => 'callback_create_pruchase',
		),
);

$config[ 'order_fields' ] = array(
		'account' => array(
				'name' => 'account',
				'label' => 'account',
				'validation_rule' => 'required',
		),
		'market' => array(
				'name' => 'market',
				'label' => 'market',
		),
		'transactionID' => array(
				'name' => 'transactionID',
				'label' => 'transactionID',
		),
		'listID' => array(
				'name' => 'listID',
				'label' => 'listID',
		),
		'salesrecord' => array(
				'name' => 'salesrecord',
				'label' => 'salesrecord',
		),
		'epid' => array(
				'name' => 'epid',
				'label' => 'epid',
		),
		'catNum' => array(
				'name' => 'catNum',
				'label' => 'catNum',
		),
		'catName' => array(
				'name' => 'catName',
				'label' => 'catName',
		),
		'isbn10' => array(
				'name' => 'isbn10',
				'label' => 'isbn10',
		),
		'isbn13' => array(
				'name' => 'isbn13',
				'label' => 'isbn13',
		),
		'upc' => array(
				'name' => 'upc',
				'label' => 'upc',
		),
		'asin' => array(
				'name' => 'asin',
				'label' => 'asin',
		),
		'title' => array(
				'name' => 'title',
				'label' => 'title',
				'view_style' => 'textarea rows="4" cols="50"',
		),
		'salePrice' => array(
				'name' => 'salePrice',
				'label' => 'salePrice',
				'validation_rule' => 'decimal',
		),
		'quantity' => array(
				'name' => 'quantity',
				'label' => 'quantity',
		),
		'saleTime' => array(
				'name' => 'saleTime',
				'label' => 'saleTime',
		),
		'globalSale' => array(
				'name' => 'globalSale',
				'label' => 'globalSale',
		),
		'buyerID' => array(
				'name' => 'buyerID',
				'label' => 'buyerID',
		),
		'buyerName' => array(
				'name' => 'buyerName',
				'label' => 'buyerName',
		),
		'buyerEmail' => array(
				'name' => 'buyerEmail',
				'label' => 'buyerEmail',
		),
		'buyerAddr1' => array(
				'name' => 'buyerAddr1',
				'label' => 'buyerAddr1',
		),
		'buyerAddr2' => array(
				'name' => 'buyerAddr2',
				'label' => 'buyerAddr2',
		),
		'buyerCity' => array(
				'name' => 'buyerCity',
				'label' => 'buyerCity',
		),
		'buyerState' => array(
				'name' => 'buyerState',
				'label' => 'buyerState',
		),
		'buyerCountry' => array(
				'name' => 'buyerCountry',
				'label' => 'buyerCountry',
		),
		'buyerPhone' => array(
				'name' => 'buyerPhone',
				'label' => 'buyerPhone',
		),
		'sellNote' => array(
				'name' => 'sellNote',
				'label' => 'sellNote',
				'view_style' => 'textarea rows="4" cols="50"',
		),
		'orderStatus' => array(
				'name' => 'orderStatus',
				'label' => 'Order Status',
				'validation_rule' => 'required',
				'view_style' => 'select order_status',
		),
		'cost' => array(
				'name' => 'cost',
				'label' => 'cost',
				'validation_rule' => 'decimal',
		),
		'email' => array(
				'name' => 'email',
				'label' => 'email',
				'view_style' => 'select email',
		),
		'creditcard' => array(
				'name' => 'creditcard',
				'label' => 'creditcard',
				'view_style' => 'select credit_card',
		),
		'orderNum' => array(
				'name' => 'orderNum',
				'label' => 'orderNum',
		),
		'source' => array(
				'name' => 'source',
				'label' => 'source',
				'view_style' => 'select source',
		),
		'tax' => array(
				'name' => 'tax',
				'label' => 'tax',
				'validation_rule' => 'decimal',
		),
		'returnStatus' => array(
				'name' => 'returnStatus',
				'label' => 'returnStatus',
				'view_style' => 'select return_status',
		),
		'buyerRefund' => array(
				'name' => 'buyerRefund',
				'label' => 'buyerRefund',
				'validation_rule' => 'decimal',
		),
		'sellerRefund' => array(
				'name' => 'sellerRefund',
				'label' => 'sellerRefund',
				'validation_rule' => 'decimal',
		),
		'lastUpdated' => array(
				'name' => 'lastUpdated',
				'label' => 'lastUpdated',
		),
		'srLink' => array(
				'name' => 'srLink',
				'label' => 'srLink',
				'view_style' => 'textarea rows="4" cols="50"',
		),
		'paidStatus' => array(
				'name' => 'paidStatus',
				'label' => 'paidStatus',
				'view_style' => 'textarea rows="4" cols="50"',
		),
		'buyerZip' => array(
				'name' => 'buyerZip',
				'label' => 'buyerZip',
		),
		'carrier' => array(
				'name' => 'carrier',
				'label' => 'carrier',
		),
		'trackingNum' => array(
				'name' => 'trackingNum',
				'label' => 'trackingNum',
		),
		'poLine' => array(
				'name' => 'poLine',
				'label' => 'poLine',
		),
		'paypalTnxnID' => array(
				'name' => 'paypalTnxnID',
				'label' => 'paypalTnxnID',
		),
		'shippingCost' => array(
				'name' => 'shippingCost',
				'label' => 'shippingCost',
				'validation_rule' => 'decimal',
		),
);