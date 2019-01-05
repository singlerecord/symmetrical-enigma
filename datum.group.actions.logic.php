<?php
	if(isset($_POST["create"])){
		$creation_success = $db->record_create(
			$_POST["name"],
			$_POST["dataset"],
			$_SESSION["userid"]
		);
		if($creation_success){
			echo msg_num("record","created");	
		}
	}elseif(isset($_POST["update"])){
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
	}
?>
