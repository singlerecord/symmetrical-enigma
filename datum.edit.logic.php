<?php
	// access to this page
	if(!isset($_POST["datum"]["id"])){
		if(!isset($_SESSION["userid"])){
			header("Location:index.php");
		}else{
			header("Location:profile.php");
		}
	}	
	$userid = $_SESSION["userid"];
	$id = $_POST["datum"]["id"];
	// action 
	if(isset($_POST["update"])){
		$datum = Array(
			"name"=>$_POST["datum"]["name"],
			"value"=>$_POST["datum"]["value"]
		);
		$db->datum_update($userid,$id,$datum["name"],$datum["value"]);	
	}
	$datum = $db->datum_get($userid,$id);
	// content
	include "datum.edit.update.form.php";
	include "datum.edit.access.list.php";
	?>
	
