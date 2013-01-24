<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 |-------------------------------------------------------------------
| A - Administrator
| N - Normal User
| V - Viewer
|-------------------------------------------------------------------
*/
$config[ 'permission' ] = array(
		'order' => array(
				'index' => array( 'A', 'N', 'V' ),
				'modify' => array( 'A', 'N', 'V'),
				'delete' => array( 'A' ),
		),
		'user' => array(
				'index' => array( 'A' ),
				'create' => array( 'A' ),
				'modify' => array( 'A' ),
				'password' => array( 'A' ),
				'delete' => array( 'A' ),
		),
		'meta' => array(
				'index' => array( 'A' ),
				'create' => array( 'A' ),
				'modify' => array( 'A' ),
				'delete' => array( 'A' ),
				'code_index' => array( 'A' ),
				'code_create' => array( 'A' ),
				'code_modify' => array( 'A' ),
				'code_delete' => array( 'A' ),
		),
);
