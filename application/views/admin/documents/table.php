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
<a style="float: right;" class="btn btn-primary btn-danger" title="Add record" href="<?=base_url()?>admin/<?=$method?>/add/">+ Add Document</a>
</h1>

<?=$search?>

<table id="admin_table" class="display"> 
<thead>
<tr>
<th></th>
<th>Title</th>
<th>Description</th>
<th>PDF Path</th>
</tr>
</thead>
<tfoot>
</tfoot>
<tbody>
<?php if( ! empty($records )): ?>
<?php foreach ($records as $record ): ?>
<tr>
<td width="3%">
    <a class="btn btn-primary" title="Edit record <?=$record->id?>" href="<?=base_url()?>admin/<?=$method?>/edit/<?=$record->id?>" >Edit</a>
</td>
<td><a style="color:#000" href="<?=base_url()?><?=$record->pdf_path?>"><?=$record->title?></a></td>
<td><a style="color:#000" href="<?=base_url()?><?=$record->pdf_path?>"><?=$record->description?></a></td>
<td><a style="color:#000" href="<?=base_url()?><?=$record->pdf_path?>"><?=$record->pdf_path?></a></td>
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

