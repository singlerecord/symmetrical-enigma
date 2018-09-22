        <table id="data">
                <tr><th>Name</th><th>Value</th><th>Actions</th></tr>
<?php
        foreach($db->user_get_data($userid) as $datum){
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
                                        <form style="display:inline;"action="<?php echo edit_datum_endpoint(); ?>" method="post">
                                                <input type="submit" name="manage" id="manage" value="Manage Access"/>
						<input type="submit" name="delete" id="delete" value="Delete"/>
                                                <input type="hidden" name="datum[id]" value="<?php echo $id; ?>"/>
                                        </form>
                                </td>
                        </tr>
                <?php
        }
?>
        </table>
