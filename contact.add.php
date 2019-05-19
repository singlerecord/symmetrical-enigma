<?php
	/* environment */
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	/* includes */
	require_once "endpoints.php";
	require_once toolbox();
	require_once singlerecord();
	$db = new singlerecord_sql();
	/*if(//contact exists
		&&
		//contact is not self)*/
	//print_r($_POST);
	$owner = $_POST["owner_id"];
	$new_contact = $_POST["add_contact"];
	$contact_name = $_POST["contact_name"];
	$db->user_add_contact($owner,$new_contact,$contact_name);
	header("Location:profile.php");
?>
