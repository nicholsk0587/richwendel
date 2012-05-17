<div class="content">
<script type="text/javascript">
bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
<script>
	$(function() {
		$( ".datepicker" ).datepicker({ dateFormat: "yy-mm-dd" });
	});
</script>

<h1>Blog/News <small> - <?=$page_action?> Blog/News</small></h1>
<?php echo validation_errors(); ?>
    <?php echo form_open_multipart('/admin/'. $method); ?>
    
<input type="hidden" id="id" name="id" value="<?=!empty($record->id) ? $record->id : NULL ?>" >

<?php if(!empty($category)):?>
        <div class="clearfix">        
            <label for="category_id">CATEGORY: </label>
                <div class="input">
                    <select name="category_id">
                    <?php foreach ($category as $c):?>
                    <option value="<?=$c->id?>" <?php if(!empty($record->category_id)):?><?=$record->category_id == $c->id ? 'selected="selected"' : NULL ?><?php endif;?>><?=$c->title?></option>
                    <?php endforeach;?>
                    </select>
                </div>
        </div>
<?php endif?>

        <div class="clearfix">        
            <label for="title">TITLE: </label>
                <div class="input">
                    <input type="text" class="required" id="title" name="title" value="<?=!empty($record->title) ? $record->title : NULL ?>" >
                </div>
        </div>
        
        <div class="clearfix">                
            <label for="caption">AUTHOR: </label>
                <div class="input">
                    <input type="text" class="required" id="author" name="author" value="<?=!empty($record->author) ? $record->author : NULL ?>" >
                </div>
        </div>
        
        <div class="clearfix">                        
            <label for="body">BODY: </label>
                <div class="input">
                    <textarea  id="story" class="required wide-text tall-text" name="body"><?=!empty($record->body) ? $record->body : NULL ?></textarea>
                </div>
        </div>

        <div class="clearfix">                        
            <label for="published_date">PUBLISHED DATE: </label>
                <div class="input">
                    <input type="text" class="datepicker" id="datepicker" name="published_date" value="<?=!empty($record->published_date) ? $record->published_date : NULL ?>" >
                </div>
        </div>
        
        <div class="clearfix">                                        
            <label for="active">TYPE: </label>
                <div class="input">
                    <input type="radio" id="news" name="type" value="news" <?php if(!empty($record->type)):?><?=$record->type == 'news' ? 'checked="checked"' : NULL ?> <?php endif;?>> News
                    <input type="radio" id="blog" name="type" value="blog" <?php if(!empty($record->type)):?><?=$record->type == 'blog' ? 'checked="checked"' : NULL ?> <?php endif;?>> Blog
                </div>
        </div>

        <div class="clearfix">                                       
            <label for="active">IMAGE: </label>
            <?=!empty($record->image_path) ? '<p><a class="btn btn-primary" href="'.base_url().$record->image_path.'">Existing Image</a></p>' : NULL ?>
            <p class="hint">Attention: Don't try and upload giant images! Sure, we will resize them when we can automatically, but if it's, say, 2 MB you better shrink it first!</p> 
                <div class="input">
                    <?=form_upload('image_path');?>
                </div>
        </div>
</div>

        <div class="actions">
            <a class="btn" href="/index.php/admin/blog">Cancel</a>
                <input class="btn btn-primary" type="submit" value="Save Changes">
                <input class="btn btn-danger" type="submit" name="delete" value="DELETE" onclick="return confirm('Are you sure ?');">
        </div>
</form>

</div>