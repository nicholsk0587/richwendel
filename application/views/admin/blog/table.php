<style>
    @import "/resources/data_tables/css/demo_table.css";
</style>
<script type="text/javascript" src="/resources/data_tables/js/jquery.dataTables.js"></script>
<script type="text/javascript">	
    $(document).ready(function() {
    
    $('#admin_table').dataTable({
        "sDom": '<"nav navbar "f>tlip'
    });

    	
});
</script>

<h1><?=humanize($this->uri->segment(2)) . ' Administration'?>
<a style="float: right;" class="btn btn-primary btn-danger" title="Add record" href="<?=base_url()?>admin/<?=$method?>/add/">+ Add News or Blog</a>
</h1>

<?=$search?>

<table id="admin_table" class="display"> 
<thead>
<tr>
<th></th>
<th>Published Date</th>
<th>Author</th>
<th>Title</th>
<th>Body</th>
<th>Type</th>
</tr>
</thead>
<tfoot>
</tfoot>
<tbody>
<?php if( ! empty($records )): ?>
<?php foreach ($records as $record ): ?>
<?php 
$d = explode('-', $record->published_date);
//echo '<pre>' . print_r($d,1) . '</pre>';
$date = date("m-d-Y", mktime(0,0,0,$d[1],substr($d[2],0,2),$d[0]));
//echo $date;
?>
<tr>
<td width="3%">
    <a class="btn btn-primary" title="Edit record <?=$record->id?>" href="<?=base_url()?>admin/<?=$method?>/edit/<?=$record->id?>" >Edit</a>
</td>
<td width="7%"><?=$date?></td>
<td><?=$record->author?></td>
<td><?=$record->title?></td>
<td><?=substr($record->body,0,50)?>...</td>
<td><?=humanize($record->type)?></td>
</tr>
<?php endforeach; ?>
<?php else:  ?>
No records
<?php endif; ?>
</tbody>
</table>
<?php if($debug):?>
<?php echo '<pre>' . print_r($records,1) . '</pre>';?>
<?php endif;?>

