<div class="content">
<script type="text/javascript">
bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
<script>
	$(function() {
		$( "#datepicker" ).datepicker();
	});
</script>

<h1><?php echo humanize($page_title); ?> <small> - <?=$page_action?> </small></h1>

<?php echo form_open_multipart('/admin/'. $method); ?>

<input type="hidden" id="id" name="id" value="<?=!empty($record->id) ? $record->id : NULL ?>" >

<?php foreach ($field_data as $field ): ?>
<?php if($field->name == 'id'): ?>
<input type="hidden" id="<?=$field->name?>" name="<?=$field->name?>" value="<?=!empty($record->{$field->name}) ? $record->{$field->name} : NULL ?>" >

<?php elseif($field->name == 'password'): ?>
<label for="<?=$field->name?>"><?=strtoupper(humanize($field->name))?></label>
<input type="password" id="<?=$field->name?>" name="<?=$field->name?>" value="<?=!empty($record->{$field->name}) ? $record->{$field->name} : NULL ?>" >

<?php elseif($field->name == 'sort_order'): ?>
<label for="<?=$field->name?>"><?=strtoupper(humanize($field->name))?></label>
<input type="text" id="<?=$field->name?>" name="<?=$field->name?>" value="<?=!empty($record->{$field->name}) ? $record->{$field->name} : NULL ?>" >

<?php elseif($field->name == 'body'): ?>
<label for="<?=$field->name?>"><?=strtoupper(humanize($field->name))?></label>
<p>Remember to not paste directly from Word! You will copy over formatting you may not want. "Clean" your copy by pasting from Word into Notepad then copy/paste into here.</p>
<textarea id="<?=$field->name?>" name="<?=$field->name?>" class="wide-text tall-text"><?=!empty($record->{$field->name}) ? $record->{$field->name} : NULL ?></textarea>

<?php elseif($field->name == 'answer'): ?>
<label for="<?=$field->name?>"><?=strtoupper(humanize($field->name))?></label>
<p>Remember to not paste directly from Word! You will copy over formatting you may not want. "Clean" your copy by pasting from Word into Notepad then copy/paste into here.</p>
<textarea id="<?=$field->name?>" name="<?=$field->name?>" class="wide-text tall-text"><?=!empty($record->{$field->name}) ? $record->{$field->name} : NULL ?></textarea>

<?php elseif($field->name == 'caption'): ?>
<label for="<?=$field->name?>"><?=strtoupper(humanize($field->name))?></label>
<p>Remember to not paste directly from Word! You will copy over formatting you may not want. "Clean" your copy by pasting from Word into Notepad then copy/paste into here.</p>
<textarea id="<?=$field->name?>" name="<?=$field->name?>" class="wide-text"><?=!empty($record->{$field->name}) ? $record->{$field->name} : NULL ?></textarea>

<?php elseif($field->name == 'image_desc'): ?>
<label for="<?=$field->name?>"><?=strtoupper(humanize($field->name))?></label>
<p>Remember to not paste directly from Word! You will copy over formatting you may not want. "Clean" your copy by pasting from Word into Notepad then copy/paste into here.</p>
<textarea id="<?=$field->name?>" name="<?=$field->name?>" class="wide-text"><?=!empty($record->{$field->name}) ? $record->{$field->name} : NULL ?></textarea>

<?php elseif($field->name == 'bio'): ?>
<label for="<?=$field->name?>"><?=strtoupper(humanize($field->name))?></label>
<p>Remember to not paste directly from Word! You will copy over formatting you may not want. "Clean" your copy by pasting from Word into Notepad then copy/paste into here.</p>
<textarea id="<?=$field->name?>" name="<?=$field->name?>" class="wide-text tall-text"><?=!empty($record->{$field->name}) ? $record->{$field->name} : NULL ?></textarea>

<?php elseif($field->name == 'abstract'): ?>
<label for="<?=$field->name?>"><?=strtoupper(humanize($field->name))?></label>
<p>Remember to not paste directly from Word! You will copy over formatting you may not want. "Clean" your copy by pasting from Word into Notepad then copy/paste into here.</p>
<textarea id="<?=$field->name?>" name="<?=$field->name?>" class="wide-text tall-text"><?=!empty($record->{$field->name}) ? $record->{$field->name} : NULL ?></textarea>

<?php elseif($field->name == 'archived'): ?>
<label for="<?=$field->name?>"><?=strtoupper(humanize($field->name))?></label>
<input type="hidden" name="<?=$field->name?>" value="" >
<input type="checkbox" id="<?=$field->name?>" name="<?=$field->name?>" value="Y" <?=!empty($record->{$field->name}) ? 'checked="checked"' : NULL ?>>

<?php elseif($field->name == 'show'): ?>
<label for="<?=$field->name?>">Former Directors</label>
<input type="hidden" name="<?=$field->name?>" value="N" >
<input type="checkbox" id="<?=$field->name?>" name="<?=$field->name?>" value="Y" <?=!empty($record->{$field->name}) ? 'checked="checked"' : NULL ?>>

<?php elseif($field->name == 'grant'): ?>
<label for="<?=$field->name?>"><?=strtoupper(humanize($field->name))?></label>
<input type="hidden" name="<?=$field->name?>" value="" >
<input type="checkbox" id="<?=$field->name?>" name="<?=$field->name?>" value="Y" <?=!empty($record->{$field->name}) ? 'checked="checked"' : NULL ?>>

<?php elseif($field->name == 'type'): ?>
<?php if($this->uri->segment(2) == 'press'):?>
<input type="hidden" value="press" name="type"/>
<?php elseif($this->uri->segment(2) == 'news'):?>
<input type="hidden" value="news" name="type"/>
<?php endif;?>

<?php elseif($field->name == 'featured'): ?>
<label for="<?=$field->name?>"><?=strtoupper(humanize($field->name))?></label>
<input type="hidden" name="<?=$field->name?>" value="" >
<input type="checkbox" id="<?=$field->name?>" name="<?=$field->name?>" value="Y" <?=!empty($record->{$field->name}) ? 'checked="checked"' : NULL ?>>

<?php elseif($field->name == 'section'): ?>
<label for="<?=$field->name?>"><?=strtoupper(humanize($field->name))?></label>
<p>Remember to not paste directly from Word! You will copy over formatting you may not want. "Clean" your copy by pasting from Word into Notepad then copy/paste into here.</p>
<select name="section">
	<option value="Welcome">Welcome Page</option>
<optgroup label="About Us">
	<option value="about_overview">About Us - Overview</option>
	<option value="history">History</option>
	<option value="bio">Charles Dater Bio</option>
	<option value="board">Board of Directors</option>
</optgroup>
<optgroup label="Grants">
	<option value="grants_overview">Grants-Overview</option>
	<option value="guidelines">Guidelines</option>
	<option value="application">Grant Request/Application</option>
	<option value="evaluation">Evaluation Report</option>
	<option value="grant_history">Grant History</option>
</optgroup>
<optgroup label="Success Stories">
	<option value="featured_success">Featured Success Story</option>
	<option value="other_success">Other Success Stories</option>
	<option value="share">Share Your Success Story</option>
</optgroup>
<optgroup label="FAQs">
	<option value="faqs">General FAQs</option>
	<option value="grant_faqs">Grant FAQs</option>
</optgroup>
<optgroup label="News">
	<option value="news_overview">News Overview</option>
	<option value="news">News Releases</option>
	<option value="press">News/Other Information</option>
	<option value="photo">Photo Gallery</option>
	<option value="news_reports">Annual Reports</option>
</optgroup>	
</select>

<?php elseif($field->name == 'image_path'): ?>
<label for="<?=$field->name?>"><?=strtoupper(humanize($field->name))?></label>
    	<?php if( !empty($record->{$field->name}) ):?>
    		<p><a href="http://www.daterfoundation.org/<?=$record->{$field->name}?>">Existing image</a><br/>
    		<input class="btn btn-danger" type="submit" name="delete_image" value="REMOVE" onclick="return confirm('Are you sure ?');"></p> 
		<?php endif;?>
		<?php echo form_upload($field->name, "", "id='image' " ); ?>

<?php elseif($field->name == 'pdf_path'): ?>
<label for="<?=$field->name?>"><?=strtoupper(humanize($field->name))?></label>
    	<?php if( !empty($record->{$field->name}) ):?>
    		<p>Existing pdf:  <?=$record->{$field->name}?></p>      
		<?php endif;?>
		<?php echo form_upload($field->name, "", "id='image' " ); ?>		


<?php else : ?>
<label for="<?=$field->name?>"><?=strtoupper(humanize($field->name))?>: </label>

<?php switch($field->type): ?>
<?php case 'text': ?>
<textarea id="<?=$field->name?>" name="<?=$field->name?>"><?=!empty($record->{$field->name}) ? $record->{$field->name} : NULL ?></textarea>
<?php break; ?>

<?php case 'longtext': ?>
<textarea id="<?=$field->name?>" name="<?=$field->name?>"><?=!empty($record->{$field->name}) ? $record->{$field->name} : NULL ?></textarea>
<?php break; ?>

<?php case 'tinyint' && $field->max_length == 1: ?>
<input type="hidden" name="<?=$field->name?>" value="0">
<input type="checkbox" id="<?=$field->name?>" name="<?=$field->name?>" value="1" <?=!empty($record->{$field->name}) ? 'checked="checked"' : NULL ?> >
<?php break; ?>

<?php case 'varchar': ?>
<input type="text" id="<?=$field->name?>" name="<?=$field->name?>" value="<?=!empty($record->{$field->name}) ? $record->{$field->name} : NULL ?>" >
<?php break; ?>

<?php case 'date': ?>
<input type="text" class="datepicker" id="<?=$field->name?>" name="<?=$field->name?>" value="<?=!empty($record->{$field->name}) ? $record->{$field->name} : NULL ?>" >
<?php break; ?>

<?php default: ?>
<input type="text" id="<?=$field->name?>" name="<?=$field->name?>" value="<?=!empty($record->{$field->name}) ? $record->{$field->name} : NULL ?>" >
<?php endswitch; ?>
<?php endif; ?>
<br>
<?php endforeach;?>

        <div class="actions">
            <a class="btn" href="/admin/">Cancel</a>
                <input class="btn btn-primary" type="submit" value="Save Changes">
                <input class="btn btn-danger" type="submit" name="delete" value="DELETE" onclick="return confirm('Are you sure ?');">
        </div>
</form>
</div>

</div>
