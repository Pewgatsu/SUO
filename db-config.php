<?php
	$dbDetails = array (
	'host' => 'localhost',
	'user' => 'root',
	'db'   => 'project');
	
	$table = 'component';
	$primaryKey= 'component_id';
	$columns = array(
		array('db'=>'component_image', 'dt' => 0),
		array('db'=>'component_name', 'dt' => 1),
		array('db'=>'component_type', 'dt' => 2),
		array('db'=>'component_price', 'dt' => 3),
	);
	
	require('ssp.class.php');
	
	echo json_encode( 
    SSP::simple( $_GET, $dbDetails, $table, $primaryKey, $columns ) 
);
?>