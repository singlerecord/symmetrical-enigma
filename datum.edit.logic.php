<?php
	// datum id is defined
	$user_id = $_SESSION["userid"];
	$datum_id = $_POST["datum"]["id"];
	// action 
	if(isset($_POST["update"])){
		$datum = Array(
			"name"=>$_POST["datum"]["name"],
			"value"=>$_POST["datum"]["value"]
		);
		$edit_success = $db->datum_update($user_id,$datum_id,$datum["name"],$datum["value"]);	
		if($edit_success){
			echo msg_num("datum","edited");
		}
	}else{
		$datum = $db->datum_get($user_id,$datum_id);
	}
	// content
	include "datum.edit.update.form.php";
	include "datum.edit.delete.form.php";
	?>
	
