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
			$datum_record_id = $datum_id;
			$notification_success = $db->notify($user_id,$datum_record_id,"datum");
			if($notification_success){
				echo msg_num("notification","success");			
			}else{
				echo err_num("notification","failure");
			}
		}
	}else{
		$datum = $db->datum_get($datum_id);
	}
	// content
	?>
	
