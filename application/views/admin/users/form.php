<div class="content">
<script type="text/javascript">
bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
<script>
	$(function() {
		$( ".datepicker" ).datepicker();
	});
</script>

<h1><?php echo humanize($page_title); ?> <small> - <?=$page_action?> User</small></h1>
<?php echo validation_errors(); ?>
    <?php echo form_open_multipart('/admin/'. $method); ?>
    
<input type="hidden" id="id" name="id" value="<?=!empty($record->id) ? $record->id : NULL ?>" >


        <div class="clearfix">        
            <label for="username">USERNAME: </label>
                <div class="input">
                    <input type="text" class="required" id="username" name="username" value="<?=!empty($record->username) ? $record->username : NULL ?>" >
                </div>
        </div>

<?php if($this->uri->segment(3) == 'add'):?>
        <div class="clearfix">        
            <label for="password">PASSWORD: </label>
                <div class="input">
                    <input type="password" class="required" id="password" name="password" value="<?=!empty($record->password) ? $this->encrypt->decode($record->password) : NULL ?>">
                </div>
        </div>
<?php endif;?>

<?php if($this->uri->segment(3) == 'edit'):?>        
        <div class="clearfix">        
            <label for="new_password">NEW PASSWORD: </label>
                <div class="input">
                    <input type="password" class="required" id="new_password" name="new_password" value="" >
                </div>
        </div>
<?php endif;?>

        <div class="clearfix">        
            <label for="level">LEVEL: </label>
                <div class="input">
                	<select name="level">
						<option value="user" <?php if(!empty($record->level)):?><?=$record->level == 'user' ? 'selected="selected"' : NULL ?> <?php endif;?> >user</option>
						<option value="admin" <?php if(!empty($record->level)):?><?=$record->level == 'admin' ? 'selected="selected"' : NULL ?> <?php endif;?> >admin</option>
                	</select>
                </div>
        </div>
</div>

        <div class="actions">
            <a class="btn" href="/index.php/admin/users">Cancel</a>
                <input class="btn btn-primary" type="submit" value="Save Changes">
                <input class="btn btn-danger" type="submit" name="delete" value="DELETE" onclick="return confirm('Are you sure ?');">
        </div>
</form>

</div>