<div class="content">
<script type="text/javascript">
bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
<script>
	$(function() {
		$( ".datepicker" ).datepicker();
	});
</script>

<h1><?php echo humanize($page_title); ?> <small> - <?=$page_action?>Category</small></h1>
<?php echo validation_errors(); ?>
    <?php echo form_open_multipart('/admin/'. $method); ?>
    
<input type="hidden" id="id" name="id" value="<?=!empty($record->id) ? $record->id : NULL ?>" >


        <div class="clearfix">        
            <label for="title">TITLE: </label>
                <div class="input">
                    <input type="text" class="required" id="title" name="title" value="<?=!empty($record->title) ? $record->title : NULL ?>" >
                </div>
        </div>
        
</div>

        <div class="actions">
            <a class="btn" href="/index.php/admin/category">Cancel</a>
                <input class="btn btn-primary" type="submit" value="Save Changes">
                <input class="btn btn-danger" type="submit" name="delete" value="DELETE" onclick="return confirm('Are you sure ?');">
        </div>
</form>

</div>