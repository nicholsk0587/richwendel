<div class="content">
<script type="text/javascript">
bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
<script>
	$(function() {
		$( ".datepicker" ).datepicker();
	});
</script>

<h1>Media/Video <small> - <?=$page_action?> Media/Video</small></h1>
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
            <label for="caption">DESCRIPTION: </label>
                <div class="input">
                    <textarea  id="description" class="wide-text" name="description"><?=!empty($record->description) ? $record->description : NULL ?></textarea>
                </div>
        </div>

        <div class="clearfix">                                        
            <label for="type">TYPE: </label>
                <div class="input">
                    <input type="radio" id="type-1" name="type" value="video" <?php if(!empty($record->type)):?><?=$record->type == 'video' ? 'checked="checked"' : NULL ?> <?php endif;?>> Video
                    <input type="radio" id="type-2" name="type" value="other" <?php if(!empty($record->type)):?><?=$record->type == 'other' ? 'checked="checked"' : NULL ?> <?php endif;?>> Other
                </div>
        </div>
        
        <div class="clearfix">                                        
            <label for="archived">ARCHIVED: </label>
                <div class="input">
                    <input type="hidden" name="archived" value="0">
                    <input type="checkbox" id="archived" name="archived" value="1" <?=!empty($record->archived) ? 'checked="checked"' : NULL ?> >
                </div>
        </div>

        <div class="clearfix">                                       
            <label for="active">VIDEO/MEDIA: </label>
            <p style="font-size:85%;">Note: Acceptable filetypes are: mpeg,mpg,mpe,qt,mov,avi,movie. </p>
                <div class="input">
                    <?=!empty($record->video_path) ? '<p><a class="btn btn-primary" href="'.$record->video_path.'">Existing Media</a></p>' : NULL ?>
                    <?=form_upload('video_path');?>
                </div>
        </div>

        <div class="clearfix">        
			<p>OR</p>
		</div>
		       
        <div class="clearfix">        
            <label for="youtube">YOUTUBE ID: </label>
            <p style="font-size:85%;">Note: This will be the 11 character code at the end of the video url. For example: http://www.youtube.com/watch?v=<u>lvjpm1mJXlE</u> the underlined portion is what you need.</p>
                <div class="input">
                    <input type="text" class="required" id="youtube_link" name="youtube_link" value="<?=!empty($record->youtube_link) ? $record->youtube_link : NULL ?>" >
                </div>
        </div>
        
</div>

        <div class="actions">
            <a class="btn" href="/index.php/admin/media">Cancel</a>
                <input class="btn btn-primary" type="submit" value="Save Changes">
                <input class="btn btn-danger" type="submit" name="delete" value="DELETE" onclick="return confirm('Are you sure ?');">
        </div>
</form>

</div>