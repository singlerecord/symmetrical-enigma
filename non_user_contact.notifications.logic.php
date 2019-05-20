<?php
/*
	// environment 
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	// includes 
	require_once "endpoints.php";
	require_once toolbox();
	require_once singlerecord();
	require_once feedback();
	$db = new singlerecord_sql();
 */
	if(isset($_POST["create"]) ||  isset($_POST["update"])){ 
		$notification_set = Array();
		if(isset($_POST["datum_record_types_ids"])){
			foreach($_POST["datum_record_types_ids"] as $datum_record_type_id){
				$exp = explode("-",$datum_record_type_id);
				$type = $exp[0];
				$id = (int)$exp[1];
				array_push($notification_set,
					Array(
						"datum_record_id"=>$id,
						"type"=>$type
					)
				);
			}
		}	
		if(isset($_POST["create"])){
			$creation_success = $db->notification_set_create(
				$_SESSION["userid"],
				(int)$_POST["non_user_contact_id"],
				$notification_set,
				"non_user"
			);
			if($creation_success){
				echo msg_num("notification_set","created");	
			}
		}
		elseif(isset($_POST["update"])){
			$non_user_contact_id = $_POST["non_user_contact_id"];
			$owner_id = $_POST["owner_id"];
			// delete old dataset components (delete all?)
			$depopulate_success = $db->non_user_contact_notification_set_depopulate($owner_id,$non_user_contact_id);
			if($depopulate_success){
				echo msg_num("notification_set","depopulated");
			}
			$repopulate_success = $db->non_user_contact_notification_set_repopulate($owner_id,$non_user_contact_id,$notification_set);
			if($repopulate_success){
				echo msg_num("notification_set","repopulated");		
			}
			// add new
			if($depopulate_success && $repopulate_success){
				echo msg_num("notification_set","updated");
			}
		}
	}
?>
