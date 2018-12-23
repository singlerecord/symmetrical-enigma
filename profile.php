<?php
	/* environment */
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	/* includes */
        require_once "endpoints.php";
        require_once toolbox();
        require_once singlerecord();
        require_once feedback();
        require_once restricted();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="default.css"/>
</head>
<body>
	<?php include "signin.logic.php"; ?>
	<?php include "profile.logic.php"; ?>
	<?php include "record.list.php"; ?>
</body>
</html>
