<section>
    <h1>News &amp; Blog</h1>
    
    <article>
        <h2><a href="/resource/article/<?=$blog->id?>"><?=$blog->title?></a></h2>
        <p class="pub-date"><?=$blog->published_date?></p>
        
        <?php if(!empty($blog->image_path)):?>
        	<img src="<?php echo base_url().$blog->image_path?>" width="400" height="350">
        <?php endif?>
        
        <p><?php echo $blog->body?></p>
        
<p class="category">Posted In: <a href="/resource/category/<?=$blog->category_id?>" class="cat-link"><?=$blog->category_title?></a><a href="/resource/news_and_blog">Back to News &amp; Blog Home</a></p>
    </article>
</section>