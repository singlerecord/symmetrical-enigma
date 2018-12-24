<h2>data list</h2>
<?php
	include "profile.insert.datum.form.php";
?>
<table class="data">
		<?php
	$data = $db->user_get_data($user_id);
	if(count($data) == 0){?>
		<tr><td>No data yet.</td></tr>
	<?php
	}else{
	?>
		<tr><th>Name</th><th>Value</th><th>Actions</th></tr>
	<?php
        foreach($data as $datum){
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
<form style="display:inline;" action="<?php echo datum_access(); ?>" method="post">
	<input type="submit" name="manage" id="manage" value="Manage"/>
	<input type="hidden" name="datum[id]" value="<?php echo $id; ?>"/>
</form>
                                </td>
                        </tr>
                <?php
        }}
	?>
</table>
