<?php
        foreach($records as $record){
	?>  
	<tr>
        <td>
                <?php echo $record["name"];?>
        </td>
        <td>
                <form style="display:inline;" action="<?php echo datum_group_actions();?>" method="post">
                        <input type="submit" name="edit" id="edit" value="Edit"/>
                        <input type="hidden" name="record[id]" id="record[id]" value="<?php echo $record["id"];?>"/>
                </form>
                <form style="display:inline;" action="<?php echo record_manage();?>" method="post">
                        <input type="submit" name="manage" id="manage" value="Manage"/>
                        <input type="hidden" name="record[id]" id="record[id]" value="<?php echo $record["id"];?>"/>
                </form>
        </td>
	</tr>
	<?php
        }   
?>    
