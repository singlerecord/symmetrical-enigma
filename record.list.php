<div class="section">
<h2>record list</h2>
<form action="<?php echo datum_group_actions();?>" method="post">
        <label for="new_record">Create Record
		<input type="submit" id="new_record" value="New Record"/>
	</label>
</form>
<table class="data">
<?php
	$records = $db->user_get_records($user_id);
	if(count($records) == 0){
?>
		<p>No records created yet.</p>		
<?php

	}else{
	?>
	<th>Name</th><th>Actions</th>	
	<?php
		foreach($records as $record){
?>
	<tr>
		<td>
			<?php echo $record["name"];?>
		</td>
		<td>
			<form action="<?php echo datum_group_actions();?>" method="post">
				<input type="submit" name="edit" id="edit" value="Edit"/>
				<input type="submit" name="manage" id="manage" value="Manage"/>
				<input type="hidden" name="record[id]" id="record[id]" value="<?php echo $record["id"];?>"/>
			</form>
		</td>
	</tr>
<?php
		}
	}
?>
</table>
</div>
