<?php
	/* environment */
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	/* includes */
	require_once "endpoints.php";
	require_once toolbox();
	require_once singlerecord();
	$db = new singlerecord_sql();
	
?>
