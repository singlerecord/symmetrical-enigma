<div class="section">
<h2>contact list</h2>
<div>
	<form action="" method="">
		<label for="add_contact">
			<input type="text" name="add_contact" id="add_contact" />	
		</label>
		<input type="submit" id="add" name="add" value="Add Contact"/>
		<span class="help" >?<span>You can use SR username or ID.</span></span>
	</form>
</div>
<table>
<?php
	$contacts = $db->user_get_contacts($user_id);
	if(count($contacts) == 0){
	?>
		<tr><td>No contacts yet.</td></tr>
	<?php
		
	}else{
		foreach($contacts as $contact){		
	?>

	<?php
		}	
	}
?>
</table>
</div>
