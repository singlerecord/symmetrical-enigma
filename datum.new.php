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
	$user_id = $_SESSION["userid"];
	$name = $_POST["datum"]["name"];
	$value = $_POST["datum"]["value"];
	$db->datum_insert($user_id,$name,$value);
	header("Location:profile.php");
?>
