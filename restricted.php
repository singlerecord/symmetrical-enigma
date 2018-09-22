<?php
	if(!isset($_SESSION)){
		session_start();
		if(!$_SESSION["loggedin"]){
			header("Location:index.php");
		}
	}	
?>
