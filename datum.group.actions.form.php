<table>
	<form action=<?php echo datum_group_actions();?> method="post">
	<?php
		$user_id = $_SESSION["userid"];
		$dataset = $db->user_get_data($user_id);
		foreach($dataset as $datum){
		?>
			<tr>
				<td>
					<input type="checkbox" name="dataset[]" id="dataset[]" value="<?php echo $datum["id"];?>"/>
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
		<input type="submit" name="group" id="group" value="Create Dataset"/>
	</form>
</table>
