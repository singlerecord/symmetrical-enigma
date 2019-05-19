<form action=<?php echo non_user_contact_notifications_create();?> method="post">
					
	<table>
	<?php
		$user_id = $_SESSION["userid"];
		$data_records = $db->user_get_data_records($user_id);
		
		if(isset($_POST["owner_id"]) && isset($_POST["non_user_contact_id"])){
			$owner_id = $_POST["owner_id"];
			echo hidden_input("owner_id",$owner_id);
			$non_user_contact_id = $_POST["non_user_contact_id"];
			$notification_set = $db->user_get_non_user_contact_notification_set($owner_id,$non_user_contact_id);
		}
	?>
		<input 	type="hidden" 
			id="non_user_contact_id" 
			name="non_user_contact_id" 
			value="<?php echo $non_user_contact_id;?>"
		/><?php
		//print_r($data_records);
		foreach($data_records as $index => $datum){
			//print_r($datum);
			if($datum["type"] == "record"){
				$data_item = new record($datum);	
			}else{
				$data_item = new datum($datum);	
			}
		?>
			<tr>
				<td>
					<input 
					<?php 
						if(isset($notification_set["notifications"])){
							if(isset($notification_set["notifications"][$datum["type"]][$datum["id"]])){
								echo "checked ";	
							}	
						}
					?>
					type="checkbox" 
					name="datum_record_ids[]" 
					id="datum_record_ids[]" 
					value="<?php echo $datum["type"]."-".$datum["id"];?>"/>
					
					
				</td>
				<td>
					<?php echo $datum["name"]; ?>
				</td>
				<td>
					<?php
						/* 
						if(isset($datum["value"])){
							echo $datum["value"];
						}*/ 
						// records do not have value...
						echo $data_item->getValue($db);
					?>
				</td>
			</tr>		
		<?php		
		}
		?>
	</table>
		<?php if(isset($notification_set["notifications"])) { ?>
			<input type="submit" id="update" name="update" value="Update"/>
		<?php }else{ ?>
			<input type="submit" id="create" name="create" value="Create"/>
		<?php } ?>
</form>
<?php if(isset($notification_set["notifications"])){ ?>
<form action="<?php echo non_user_contact_notification_delete();?>" method="post" />
	<input type="submit" id="delete" name="delete" value="Delete"/>
	<input type="hidden" id="notification_set_id" name="notification_set_id" value="<?php echo $notification_set["id"];?>"/>
</form>
<?php } ?>
