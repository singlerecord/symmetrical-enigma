<?php
	/* environment */
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	/* includes */
	require_once "endpoints.php";
	require_once toolbox();
	require_once singlerecord();
	$db = new singlerecord_sql();
	$contact_id = $_POST["non_user_contact_id"];
	$db->non_user_contact_delete($contact_id);
	header("Location:profile.php");
?>
