<section>
    <h1>News &amp; Blog</h1>
    <?php $url = str_replace('_',' ',$this->uri->segment(3));?>
<?php //echo '<pre>' . print_r($archived,1) . '</pre>';?>
<?php foreach ($archived as $x => $arch):?>    
<?php foreach ($arch as $k => $a):?>    
<?php if($x == $url):?>

<?php 
	$d = explode('-', $a['published_date']);
	$date = date("F d, Y", mktime(0,0,0,$d[1],substr($d[2],0,2),$d[0]));
?>
			
    <article>
        <h2><a href="/resource/article/<?=$a['id']?>"><?=$a['title']?></a></h2>
        <p class="pub-date">Posted on: <?=$date?></p>
        <?php if(!empty($a['image_path'])):?>
        <img src="<?=$a['image_path']?>" width="400" height="350"/>
        <?php endif?>
        <p><?=$a['body']?></p>
<p class="category">Posted In: <a href="/resource/category/<?=$a['category_id']?>" class="cat-link">
<?php foreach($categories as $c):?>
<?php if ($c->id == $a['category_id']):?>
<?=$c->title?>
<?php endif;?>
<?php endforeach?>
</a></p>
    </article>
<?php endif?>
<?php endforeach?>
<?php endforeach?>
    
</section>