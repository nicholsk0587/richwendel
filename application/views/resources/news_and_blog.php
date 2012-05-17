<section>
    <h1>News &amp; Blog</h1>
<?php foreach ($blogs as $b):?>    
    <article>
        <h2><a href="/resource/article/<?=$b->id?>"><?=$b->title?></a></h2>
        <p class="pub-date">Posted on: <?=$b->published_date?></p>
        <?php if(!empty($b->image_path)):?>
        <img src="<?=base_url().$b->image_path?>" width="400" height="350"/>
        <?php endif?>
        <p><?=$b->body?></p>
<p class="category">Posted In: <a href="/resource/category/<?=$b->category_id?>" class="cat-link"><?=$b->category_title?></a></p>
    </article>
<?php endforeach?>

	<?php if(!empty($links)):?>        
    <div class="paginate"><?=$links?></div>
    <?php endif?>
    
</section>