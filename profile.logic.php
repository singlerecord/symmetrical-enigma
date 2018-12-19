<?php
	// account details
	$user_id = $_SESSION["userid"];
	if(isset($_POST["new_datum"])){
		$name = $_POST["datum"]["name"];
		$value = $_POST["datum"]["value"];
		$creation_success = $db->datum_insert($user_id,$name,$value);
		if($creation_success){
			echo msg_num("datum",0);
		}
	}elseif(isset($_POST["delete"])){
		$datum_id = $_POST["datum"]["id"];
	        $deletion_success = $db->datum_delete($datum_id);
		if($deletion_success){
			echo msg_num("datum",2);
		}
	}
		// edit
	// add data
	include "profile.insert.datum.form.php";
	// user data list
	include "profile.datum.list.php";
?>
