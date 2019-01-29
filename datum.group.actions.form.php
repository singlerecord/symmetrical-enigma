<form action=<?php echo datum_group_actions();?> method="post">
	<table>
	<?php
		$user_id = $_SESSION["userid"];
		$data = $db->user_get_data($user_id);
		if(isset($_POST["record"])){
			$record_id = $_POST["record"]["id"];
			$record = $db->record_get($record_id);
			$dataset = $db->record_get_dataset($record_id);
		}
		foreach($data as $datum){
		?>
			<tr>
				<td>
					<input 
					<?php 
						if(isset($_POST["record"])){
							if(isset($dataset[$datum["id"]])){
								echo "checked ";	
							}	
						}
					?>
					type="checkbox" 
					name="dataset[]" 
					id="dataset[]" 
					value="<?php echo $datum["id"];?>"/>
				</td>
				<td>
					<?php echo $datum["name"]; ?>
				</td>
				<td>
					<?php echo $datum["value"]; ?>
				</td>
			</tr>		
		<?php		
		}
		?>
	</table>
		<?php
		if(isset($_POST["record"])){
	?>
		<label for="name">Record Name
			<input type="input" name="record[name]" id="record[name]" value="<?php echo $record["name"];?>" />
		</label>
		<input type="submit" name="update" id="update" value="Update Record"/>
		<input type="hidden" name="record[id]" id="record[id]" value="<?php echo $record_id; ?>"/>
	<?php
		}else{
	?>  
		<label for="name">New Record Name
			<input type="input" name="name" id="name" 
			<?php
				if(isset($_POST["record"])){
					echo "value=\"".$record["name"]."\"";
				}
			?>	
			/>
		</label>
	
		<input type="submit" name="create" id="create" value="Create New Record"/>
		
	<?php
		}
	?>
</form>
