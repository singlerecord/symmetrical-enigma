<table>
<?php
	$contacts = $db->user_get_contacts($user_id);
	if(count($contacts) == 0){
	?>
		<tr><td>No singlerecord user contacts yet.</td></tr>
	<?php
		
	}else{
		foreach($contacts as $contact){		
	?>

	<?php
		}	
	}
	$non_user_contacts = $db->user_get_non_user_contacts($user_id);
	if(count($non_user_contacts) == 0){
	?>
		<tr><td>No non-user contacts yet.</td></tr>
	<?php
		
		}else{
	?>
		</table>
		<h3>non-user contacts</h3>
		<table>
		<tr><th>Name</th><th>E-mail</th><th>Actions</th></tr>
	<?php
		foreach($non_user_contacts as $contact){		
	?>
		<tr>
			<td><?php echo $contact["name"];?></td>
			<td><?php echo $contact["email"];?></td>
			<td>
				<table>
					<tr>
						<td>
							<form action="<?php echo non_user_contact_delete();?>" method="post">
								<input type="submit" id="delete" name="delete" value="Delete"/>
								<input type="hidden" id="non_user_contact_id" name="non_user_contact_id" value="<?php echo $contact["id"];?>"/>
							</form>
						</td>
						<td>
							<form action="<?php echo non_user_contact_notifications();?>" method="post">
								<input type="submit" id="notifications" name="notifications" value="Notifications"/>
								<input type="hidden" id="non_user_contact_id" name="non_user_contact_id" value="<?php echo $contact["id"];?>" />
								<input type="hidden" id="owner_id" name="owner_id" value="<?php echo $_SESSION["userid"];?>" />
							</form>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	<?php
		}	
	}

?>
</table>

