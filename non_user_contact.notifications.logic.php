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
	if(isset($_POST["create"])){
		$notification_set = Array();
		foreach($_POST["datum_record_ids"] as $datum_record_type_id){
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
		$creation_success = $db->notification_set_create(
			$_SESSION["userid"],
			
			(int)$_POST["non_user_contact_id"],
			$notification_set
		);
		/*
		if($creation_success){
			echo msg_num("notification_set","created");	
		}*/
	}/*
	elseif(isset($_POST["update"])){
		$record_id = $_POST["record"]["id"];
		$dataset = $_POST["dataset"];
		$name = $_POST["record"]["name"];
		// delete old dataset components (delete all?)
		$depopulate_success = $db->record_depopulate($record_id);
		if($depopulate_success){
			//echo msg_num("record","depopulated");
		}
		$repopulate_success = $db->record_repopulate($record_id,$dataset);
		if($repopulate_success){
			//echo msg_num("record","repopulated");		
		}
		$rename_success = $db->record_rename($record_id,$name);
		if($rename_success){
			//echo msg_num("record","renamed");
		}
		// add new
		if($depopulate_success && $repopulate_success){
			echo msg_num("record","updated");
		}
	}*/
?>
