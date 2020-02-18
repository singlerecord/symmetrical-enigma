<div class="section">
<h2>Notifications</h2>

<?php
		$userid = $_SESSION["userid"];
		$notifications = $db->user_datum_record_notifications_get($userid,(int)$datum_id,"datum");
		if(count($notifications) == 0){
			?>
			<p>No contacts are currently set up to receive notifications when updating this data.</p>
			<?php
		}else{
			?>
			<p>
				The following users will be notified when you update this data:
			</p>
				<table>
					<tr>
						<th>Name</th><th>Method</th>
					</tr>
			<?php
				foreach($notifications as $notification){
					?>
						<tr>
							<td>
								<?php echo $notification["name"];?>
							</td>
							<td>
								<?php echo $notification["method"];?>
							</td>	
							<td>
								<form action=<?php echo non_user_contact_notifications();?> method="post">
									<input type="submit" id="notifications" name="notifications" value="Manage"/>
									<input type="hidden" id="non_user_contact_id" name="non_user_contact_id" value="<?php echo $notification["id"];?>" />
									<input type="hidden" id="owner_id" name="owner_id" value="<?php echo $_SESSION["userid"];?>" />
								</form>
							</td>
						</tr>
					<?php		
				}
			?>
				</table>
			<?php
		}
	?>
</div>
