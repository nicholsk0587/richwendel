<section>
    <h1>Documents</h1>
    <ul id="documents">
    <?php foreach ($docs as $d):?>
    <?php if ($d->archived != '1'):?>
		
		<li><a href="<?=base_url()?><?=$d->pdf_path?>" target="_blank"><img src="/resources/images/icn-document.png" width="60" height="60" alt="Document Icon"></a><h2><a href="<?=base_url()?><?=$d->pdf_path?>" target="_blank"><?=$d->title?></a></h2><p><?=$d->description?><a href="<?=base_url()?><?=$d->pdf_path?>" target="_blank">View</a></p></li>

    <?php endif;?>
    <?php endforeach?>  
    </ul>
</section>