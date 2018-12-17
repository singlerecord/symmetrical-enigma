<?php
	/* environment */
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	/* includes */
	require_once "php_toolbox/toolbox.php";
	require_once "singlerecord.php";
	require_once "feedback.php";
	require_once "restricted.php";
	$db = new singlerecord_sql();
	$userid = $_SESSION["userid"];
	$dname = $_POST["datum"]["name"];
	$dvalue = $_POST["datum"]["value"];
	$db->user_insert_datum($userid,$dname,$dvalue);
	header("Location:profile.php");
?>
