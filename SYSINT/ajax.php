<?php
	require 'mysql_connect.php';
	require 'ssp.php';
	$primaryKey = 'studentID';

	$sql_details = array(
	    'user' => 'root',
	    'pass' => 'root',
	    'db'   => 'intrdbproj',
	    'host' => '127.0.0.1'
		);
	$table ='student_ref';
	$column = array(
			 array( 'db' => 'studentID', 'dt' => 0 ),
			 array( 'db' => 'studentname', 'dt' => 1 )	  
		);
	
	/*
	*/

	echo json_encode(SSP::simple($_GET, $sql_details, $table, $primaryKey, $column));
	

?>