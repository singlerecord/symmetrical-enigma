<div class="section">
	<h2>contact list</h2>
	<div>
		<form action="<?php echo contact_add();?>" method="post">
			<table>
				<tr>
					<td>
						<label for="contact_name">Name
						</label>
					</td>
					<td>
						<input type="text" name="contact_name" id="contact_name"/>
					</td>
				</tr>
				<tr>
					<td>
						<label for="add_contact">E-Mail/Phone Number
							<span class="help">?
								<span>Only phone numbers in the United States (Numbers MUST begin with +1).</span>
							</span>
						</label>
					</td>
					<td>
						<input type="text" name="add_contact" id="add_contact" />	
					</td>
				</tr>
				<tr><td>
					<input type="submit" id="add" name="add" value="Add Contact"/>
						<span class="help" >?
							<span>
							If your contact does not have a SingleRecord <br/>account you can use his or her e-mail to send updates.
							</span>
						</span>
					</td>
				</tr>
			</table>
			<input type="hidden" id="owner_id" name="owner_id" value="<?php echo $_SESSION["userid"];?>">
		</form>
	</div>
		<?php include("foreach_contact.php");?>
	</div>
