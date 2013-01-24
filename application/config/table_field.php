<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 |-------------------------------------------------------------------
| A - Administrator
| N - Normal User
| V - Viewer
|-------------------------------------------------------------------
*/
$config[ 'fields' ] = array(
		'account' => array(
				'name' => 'account',
				'label' => 'account',
				'is_in_summary' => TRUE,
				'validation_rule' => 'required',
				'roles_editable' => array( 'A' ),
		),
		'market' => array(
				'name' => 'market',
				'label' => 'market',
				'is_in_summary' => TRUE,
				'roles_editable' => array( 'A' ),
		),
		'transactionID' => array(
				'name' => 'transactionID',
				'label' => 'transactionID',
				'is_in_query' => TRUE,
				'is_in_summary' => TRUE,
				'roles_editable' => array( 'A' ),
		),
		'listID' => array(
				'name' => 'listID',
				'label' => 'listID',
				'is_in_summary' => TRUE,
				'roles_editable' => array( 'A' ),
		),
		'salesrecord' => array(
				'name' => 'salesrecord',
				'label' => 'salesrecord',
				'is_in_query' => TRUE,
				'is_in_summary' => TRUE,
				'roles_editable' => array( 'A' ),
		),
		'epid' => array(
				'name' => 'epid',
				'label' => 'epid',
				'is_in_summary' => TRUE,
				'roles_editable' => array( 'A' ),
		),
		'catNum' => array(
				'name' => 'catNum',
				'label' => 'catNum',
				'is_in_summary' => TRUE,
				'roles_editable' => array( 'A' ),
		),
		'catName' => array(
				'name' => 'catName',
				'label' => 'catName',
				'is_in_summary' => TRUE,
				'roles_editable' => array( 'A' ),
		),
		'isbn10' => array(
				'name' => 'isbn10',
				'label' => 'isbn10',
				'is_in_summary' => TRUE,
				'roles_editable' => array( 'A' ),
		),
		'isbn13' => array(
				'name' => 'isbn13',
				'label' => 'isbn13',
				'is_in_summary' => TRUE,
				'roles_editable' => array( 'A' ),
		),
		'upc' => array(
				'name' => 'upc',
				'label' => 'upc',
				'is_in_summary' => TRUE,
				'roles_editable' => array( 'A' ),
		),
		'asin' => array(
				'name' => 'asin',
				'label' => 'asin',
				'is_in_summary' => TRUE,
				'roles_editable' => array( 'A' ),
		),
		'title' => array(
				'name' => 'title',
				'label' => 'title',
				'is_in_summary' => TRUE,
				'view_style' => 'textarea rows="4" cols="50"',
				'roles_editable' => array( 'A' ),
		),
		'salePrice' => array(
				'name' => 'salePrice',
				'label' => 'salePrice',
				'is_in_summary' => TRUE,
				'roles_editable' => array( 'A' ),
		),
		'quantity' => array(
				'name' => 'quantity',
				'label' => 'quantity',
				'is_in_summary' => TRUE,
				'roles_editable' => array( 'A' ),
		),
		'saleTime' => array(
				'name' => 'saleTime',
				'label' => 'saleTime',
				'is_in_summary' => TRUE,
				'roles_editable' => array( 'A' ),
		),
		'globalSale' => array(
				'name' => 'globalSale',
				'label' => 'globalSale',
				'is_in_summary' => TRUE,
				'roles_editable' => array( 'A' ),
		),
		'buyerID' => array(
				'name' => 'buyerID',
				'label' => 'buyerID',
				'is_in_query' => TRUE,
				'is_in_summary' => TRUE,
				'roles_editable' => array( 'A' ),
		),
		'buyerName' => array(
				'name' => 'buyerName',
				'label' => 'buyerName',
				'is_in_query' => TRUE,
				'is_in_summary' => TRUE,
				'roles_editable' => array( 'A' ),
		),
		'buyerEmail' => array(
				'name' => 'buyerEmail',
				'label' => 'buyerEmail',
				'is_in_summary' => TRUE,
				'roles_editable' => array( 'A' ),
		),
		'buyerAddr1' => array(
				'name' => 'buyerAddr1',
				'label' => 'buyerAddr1',
				'is_in_summary' => TRUE,
				'roles_editable' => array( 'A' ),
		),
		'buyerAddr2' => array(
				'name' => 'buyerAddr2',
				'label' => 'buyerAddr2',
				'is_in_summary' => TRUE,
				'roles_editable' => array( 'A' ),
		),
		'buyerCity' => array(
				'name' => 'buyerCity',
				'label' => 'buyerCity',
				'is_in_summary' => TRUE,
				'roles_editable' => array( 'A' ),
		),
		'buyerState' => array(
				'name' => 'buyerState',
				'label' => 'buyerState',
				'is_in_summary' => TRUE,
				'roles_editable' => array( 'A' ),
		),
		'buyerCountry' => array(
				'name' => 'buyerCountry',
				'label' => 'buyerCountry',
				'is_in_summary' => TRUE,
				'roles_editable' => array( 'A' ),
		),
		'buyerPhone' => array(
				'name' => 'buyerPhone',
				'label' => 'buyerPhone',
				'is_in_summary' => TRUE,
				'roles_editable' => array( 'A' ),
		),
		'sellNote' => array(
				'name' => 'sellNote',
				'label' => 'sellNote',
				'is_in_summary' => TRUE,
				'view_style' => 'textarea rows="4" cols="50"',
				'roles_editable' => array( 'A' ),
		),
		'orderStatus' => array(
				'name' => 'orderStatus',
				'label' => 'orderStatus',
				'is_in_summary' => TRUE,
				'view_style' => 'select order_status',
				'roles_editable' => array( 'A' ,'N'),
		),
		'cost' => array(
				'name' => 'cost',
				'label' => 'cost',
				'is_in_summary' => TRUE,
				'roles_editable' => array( 'A' ,'N'),
		),
		'email' => array(
				'name' => 'email',
				'label' => 'email',
				'is_in_summary' => TRUE,
				'view_style' => 'select email',
				'roles_editable' => array( 'A' ,'N'),
		),
		'creditcard' => array(
				'name' => 'creditcard',
				'label' => 'creditcard',
				'is_in_summary' => TRUE,
				'view_style' => 'select credit_card',
				'roles_editable' => array( 'A' ,'N'),
		),
		'orderNum' => array(
				'name' => 'orderNum',
				'label' => 'orderNum',
				'is_in_summary' => TRUE,
				'roles_editable' => array( 'A' ,'N'),
		),
		'source' => array(
				'name' => 'source',
				'label' => 'source',
				'is_in_summary' => TRUE,
				'view_style' => 'select source',
				'roles_editable' => array( 'A' ,'N'),
		),
		'tax' => array(
				'name' => 'tax',
				'label' => 'tax',
				'is_in_summary' => TRUE,
				'roles_editable' => array( 'A' ,'N'),
		),
		'returnStatus' => array(
				'name' => 'returnStatus',
				'label' => 'returnStatus',
				'is_in_summary' => TRUE,
				'view_style' => 'select return_status',
				'roles_editable' => array( 'A' ,'N'),
		),
		'buyerRefund' => array(
				'name' => 'buyerRefund',
				'label' => 'buyerRefund',
				'is_in_summary' => TRUE,
				'roles_editable' => array( 'A' ,'N'),
		),
		'sellerRefund' => array(
				'name' => 'sellerRefund',
				'label' => 'sellerRefund',
				'is_in_summary' => TRUE,
				'roles_editable' => array( 'A' ,'N'),
		),
		'lastUpdated' => array(
				'name' => 'lastUpdated',
				'label' => 'lastUpdated',
				'is_in_summary' => TRUE,
				'roles_editable' => array( 'A' ,'N'),
		),
		'srLink' => array(
				'name' => 'srLink',
				'label' => 'srLink',
				'is_in_summary' => TRUE,
				'view_style' => 'textarea rows="4" cols="50"',
				'roles_editable' => array( 'A' ,'N'),
		),
		'paidStatus' => array(
				'name' => 'paidStatus',
				'label' => 'paidStatus',
				'is_in_summary' => TRUE,
				'view_style' => 'textarea rows="4" cols="50"',
				'roles_editable' => array( 'A' ,'N'),
		),
		'buyerZip' => array(
				'name' => 'buyerZip',
				'label' => 'buyerZip',
				'is_in_summary' => TRUE,
				'roles_editable' => array( 'A' ,'N'),
		),
		'carrier' => array(
				'name' => 'carrier',
				'label' => 'carrier',
				'is_in_summary' => TRUE,
				'roles_editable' => array( 'A' ,'N'),
		),
		'trackingNum' => array(
				'name' => 'trackingNum',
				'label' => 'trackingNum',
				'is_in_summary' => TRUE,
				'roles_editable' => array( 'A' ,'N'),
		),
		'poLine' => array(
				'name' => 'poLine',
				'label' => 'poLine',
				'is_in_summary' => TRUE,
				'roles_editable' => array( 'A' ,'N'),
		),
		'paypalTnxnID' => array(
				'name' => 'paypalTnxnID',
				'label' => 'paypalTnxnID',
				'is_in_summary' => TRUE,
				'roles_editable' => array( 'A' ,'N'),
		),
		'shippingCost' => array(
				'name' => 'shippingCost',
				'label' => 'shippingCost',
				'is_in_summary' => TRUE,
				'roles_editable' => array( 'A' ,'N'),
		),
);