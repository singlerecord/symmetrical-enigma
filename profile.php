<?php
	/* environment */
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	/* includes */
	require_once "php_toolbox/toolbox.php";
	require_once "singlerecord.php";
	require_once "feedback.php";
	require_once "restricted.php";
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="default.css"/>
</head>
<body>
	<?php include "signin.logic.php"; ?>
	<?php include "profile.logic.php"; ?>
</body>
</html>
