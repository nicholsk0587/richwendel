<?php $this->load->view('layouts/admin_header'); ?>
<h1><?=$page_title?></h1>

<p>
<?php echo validation_errors(); ?>
<a class="btn btn-large btn-primary linkWhite" title="Add record" href="<?=base_url()?>admin/<?=$method?>/add/">Add</a>
</p>
<?php if( ! empty($records )): ?>
<div id="tableBody">
<table id="myTable" class="table bordered-table zebra-striped tablesorter"> 
<thead>

<tr>
<?php $hidden = array('modified');?>
<?php foreach ($fields as $field ): ?>
<?php if (!in_array($field, $hidden)):?>
<th><?=strtoupper(humanize($field))?></th>
<?php endif?>
<?php endforeach;?>
</tr>

</thead>

<tfoot></tfoot>

<tbody>
<?php foreach ($records as $record ): ?>
<tr>
<?php foreach ($fields as $field ): ?>
<?php if($field == 'id'): ?>
<td nowrap="nowrap">
    <a class="btn btn-primary linkWhite" title="Edit record <?=$record->id?>" href="<?=base_url()?>admin/<?=$method?>/edit/<?=$record->id?>" >Edit</a>
</td>
<?php elseif($field == 'password'): ?>
<td>
****
</td>

<?php elseif (in_array($field, $hidden)):?>
<td style="display:none;">
</td>

<?php else: ?>
<td><?=$record->$field?></td>
<?php endif;?>
<?php endforeach;?>
</tr>
<?php endforeach;?>
</tbody>

</table>
</div>
<?php if (!empty($error)):?>
<?php echo $error;?>
<?php endif; ?>
<ul>
<?php if (!empty($upload_data)):?>
<?php foreach ($upload_data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
<?php endif; ?>
</ul>
<?php else:  ?>
No records
<?php endif; ?>

<?php $this->load->view('layouts/admin_footer'); ?>