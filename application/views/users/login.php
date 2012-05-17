<?php echo form_open('users/login');?>
<?php echo $this->session->flashdata('message');?>
        <div>        
            <label for="username">USERNAME: </label>
                <div>
                    <input type="text" class="required" id="username" name="username" value="" >
                </div>
        </div>
        
        <div>        
            <label for="username">PASSWORD: </label>
                <div>
                    <input type="password" class="required" id="password" name="password" value="" >
                </div>
        </div>
        
        <div>
                <input type="submit" value="Sign In">
        </div>
</form>