<section>
    <h1>Helpful Links</h1>
    <ul>
    <?php foreach ($links as $l):?>
    <?php if ($l->archived != '1'):?>
        <li><h2><a href="http://<?=$l->url?>" target="_blank"><?=$l->title?></a></h2></li>
    <?php endif;?>
    <?php endforeach?>
    </ul>    
    
</section>