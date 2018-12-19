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
	$datum_id = $_POST["datum"]["id"];
	$db->datum_delete($datum_id);
	header("Location:profile.php");
?>
