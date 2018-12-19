<form action="<?php echo datum_group_actions();?>" method="post">
	<input type="submit" name="group" id="group" value="Group Actions"/>	
</form>
<table id="data">
		<tr><th>Name</th><th>Value</th><th>Actions</th></tr>
		<?php
        foreach($db->user_get_data($user_id) as $datum){
                $id = $datum["id"];
                $name = $datum["name"];
                $value = $datum["value"];
                ?>  
                        <tr>
                                <td>
                                        <?php echo $name; ?>    
                                </td>
                                <td>
                                        <?php echo $value; ?>   
                                </td>
                                <td>
<form style="display:inline;" action="<?php echo datum_edit(); ?>" method="post">
	<input type="submit" name="edit" id="edit" value="Edit"/>
	<input type="hidden" name="datum[id]" value="<?php echo $id; ?>"/>
</form>
                                </td>
                        </tr>
                <?php
        }
	?>
</table>
