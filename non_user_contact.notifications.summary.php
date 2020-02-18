<?php 
	$owner_id = (int)$_POST['owner_id'];
	$non_user_contact_id = (int)$_POST['non_user_contact_id'];
?>
<p>
	The following applies to items that are <i>checked</i>:
	<ul>
		<li>
			When this item is <b>updated</b> a <i>Notification</i> will be sent to <?php 
			echo $db->user_get_single_non_user_contact($owner_id,$non_user_contact_id)['method']
			?>.
		</li>
	</ul>	
</p>
