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
	<?php 
		include "signin.logic.php"; 
	?>
	<div class="section">
	<?php
		include "non_user_contact.notifications.summary.php";
		include "non_user_contact.notifications.logic.php";
		include "non_user_contact.notifications.form.php";
	?>
	</div>
</body>
</html>
