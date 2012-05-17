<?php echo form_open('users/forgot');?>
<?php echo $this->session->flashdata('message');?>
        <div>        
            <label for="username">USERNAME: </label>
                <div>
                    <input type="text" class="required" id="username" name="username" value="" >
                </div>
        </div>
        
        <div>
                <input type="submit" value="Retrieve Password">
        </div>
</form>