<?php
	/* environment */
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	/* includes */
	require_once "endpoints.php";
	require_once toolbox();
	require_once singlerecord();
	require_once restricted();
	$db = new singlerecord_sql();
	$datum_id = $_POST["datum"]["id"];
	$db->datum_delete($datum_id);
	header("Location:profile.php");
?>
