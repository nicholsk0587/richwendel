<div class="content">
<script type="text/javascript">
bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
<script>
	$(function() {
		$( ".datepicker" ).datepicker();
	});
</script>

<h1><?php echo humanize($page_title); ?> <small> - <?=$page_action?> Comments</small></h1>
<?php echo validation_errors(); ?>
    <?php echo form_open_multipart('/admin/'. $method); ?>
<?php //echo '<pre>' . print_r($fields,1) . '</pre>';?>    
<input type="hidden" id="id" name="id" value="<?=!empty($record->id) ? $record->id : NULL ?>" >

       	<input type="hidden" class="required" id="blog_id" name="blog_id" value="<?=!empty($record->blog_id) ? $record->blog_id : NULL ?>" >

        <div class="clearfix">        
            <label for="author_name">AUTHOR NAME: </label>
                <div class="input">
                    <input type="text" class="required" id="author_name" name="author_name" value="<?=!empty($record->author_name) ? $record->author_name : NULL ?>" >
                </div>
        </div>
        
        <div class="clearfix">        
            <label for="author_email">AUTHOR EMAIL: </label>
                <div class="input">
                    <input type="text" class="required" id="author_email" name="author_email" value="<?=!empty($record->author_email) ? $record->author_email : NULL ?>" >
                </div>
        </div>
        
        <div class="clearfix">                        
            <label for="body">BODY: </label>
                <div class="input">
                    <textarea  id="story" class="required wide-text tall-text" name="body"><?=!empty($record->body) ? $record->body : NULL ?></textarea>
                </div>
        </div>
</div>

        <div class="actions">
            <a class="btn" href="/index.php/admin/comments">Cancel</a>
                <input class="btn btn-primary" type="submit" value="Save Changes">
                <input class="btn btn-danger" type="submit" name="delete" value="DELETE" onclick="return confirm('Are you sure ?');">
        </div>
</form>

</div>