<?php
	if(isset($_POST["group"])){
		$creation_success = $db->record_create($_POST["name"],$_POST["dataset"],$_SESSION["userid"]);
		if($creation_success){
			msg_num("record",0);	
		}
	}
?>
