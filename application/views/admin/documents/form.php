<div class="content">
<script type="text/javascript">
bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
<script>
	$(function() {
		$( ".datepicker" ).datepicker();
	});
</script>

<h1><?php echo humanize($page_title); ?> <small> - <?=$page_action?> Documents</small></h1>
<?php echo validation_errors(); ?>
    <?php echo form_open_multipart('/admin/'. $method); ?>
    
<input type="hidden" id="id" name="id" value="<?=!empty($record->id) ? $record->id : NULL ?>" >
<?php //echo '<pre>' . print_r($fields,1) . '</pre>';?>
        <div class="clearfix">        
            <label for="title">TITLE: </label>
                <div class="input">
                    <input type="text" class="required" id="title" name="title" value="<?=!empty($record->title) ? $record->title : NULL ?>" >
                </div>
        </div>

        <div class="clearfix">                                       
            <label for="pdf_path">PDF: </label>
            <?=!empty($record->pdf_path) ? '<p><a class="btn btn-primary" href="'.$record->pdf_path.'">Existing PDF</a></p>' : NULL ?>
                <div class="input">
                    <?=form_upload('pdf_path');?>
                </div>
        </div>

        <div class="clearfix">                        
            <label for="description">DESCRIPTION: </label>
                <div class="input">
                    <textarea  id="description" class="required wide-text tall-text" name="description"><?=!empty($record->description) ? $record->description : NULL ?></textarea>
                </div>
        </div>

        <div class="clearfix">                                        
            <label for="active">ARCHIVED: </label>
                <div class="input">
                    <input type="hidden" name="archived" value="0">
                    <input type="checkbox" id="archived" name="active" value="1" <?=!empty($record->archived) ? 'checked="checked"' : NULL ?> >
                </div>
        </div>
</div>

        <div class="actions">
            <a class="btn" href="/index.php/admin/documents">Cancel</a>
                <input class="btn btn-primary" type="submit" value="Save Changes">
                <input class="btn btn-danger" type="submit" name="delete" value="DELETE" onclick="return confirm('Are you sure ?');">
        </div>
</form>

</div>