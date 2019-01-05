        <div>
                <span>Create new key:</span>
                <form style="display:inline;" action="<?php echo key_create();?>" method="post">
                        <label for="key[name]">Name 
                                <input type="text" name="key[name]" id="key[name]" required/>
                        </label>    
                        <input type="submit" value="New Key" name="new_key" id="new_key"/> 
                </form>
        </div>

