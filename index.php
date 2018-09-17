<?php
	/* environment */
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	/* includes */
	require_once "php_toolbox/toolbox.php";
	require_once "singlerecord.php";
	require_once "feedback.php";
	if(!isset($_SESSION)){
		session_start();
		if(!isset($_SESSION["singlerecord"])){
			$_SESSION["singlerecord"] = Array();
		}	
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="default.css"/>
</head>
<body>
	<?php include "index.logic.php"; ?>
</body>
</html>
