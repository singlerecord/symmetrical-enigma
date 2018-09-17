<?php
	/* environment */
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	/* includes */
	require_once "php_toolbox/toolbox.php";
	require_once "singlerecord.php";
	/* globals */
	$db = new singlerecord_sql();
	if(isset($_POST["user"])){
		$user = $_POST["user"];
		print_r($user);
	}
?>
<form action="index.php" method="post">
	<label>
		username:<input type="text" placeholder="username" name="user[username]" id="user[username]" />	
	</label>
	<label>
		password:<input type="password" id="user[password]" name="user[password]"/>	
	</label>
	<input type="submit">
</form>
