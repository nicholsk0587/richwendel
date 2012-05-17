<div class="content">
<script type="text/javascript">
bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
<script>
	$(function() {
		$( ".datepicker" ).datepicker();
	});
</script>

<h1>Helpful Links <small> - <?=$page_action?> Helpful Links</small></h1>
<?php echo validation_errors(); ?>
    <?php echo form_open_multipart('/admin/'. $method); ?>
    
<input type="hidden" id="id" name="id" value="<?=!empty($record->id) ? $record->id : NULL ?>" >

        <div class="clearfix">        
            <label for="title">TITLE: </label>
                <div class="input">
                    <input type="text" class="required" id="title" name="title" value="<?=!empty($record->title) ? $record->title : NULL ?>" >
                </div>
        </div>
        
        <div class="clearfix">        
            <label for="title">URL: </label>
                <div class="input">
                    http://<input type="text" class="required" id="url" name="url" value="<?=!empty($record->url) ? $record->url : NULL ?>" >
                </div>
        </div>
        
        <div class="clearfix">                                        
            <label for="archived">ARCHIVED: </label>
                <div class="input">
                    <input type="hidden" name="archived" value="0">
                    <input type="checkbox" id="archived" name="archived" value="1" <?=!empty($record->archived) ? 'checked="checked"' : NULL ?> >
                </div>
        </div>

</div>
        <div class="actions">
            <a class="btn" href="/index.php/admin/helpful">Cancel</a>
                <input class="btn btn-primary" type="submit" value="Save Changes">
                <input class="btn btn-danger" type="submit" name="delete" value="DELETE" onclick="return confirm('Are you sure ?');">
        </div>
</form>

</div>