<section>
    <h1>Videos &amp; Media</h1>
    
     <article>
     <?php foreach($videos as $v):?>
        <h2><a href="/resource/video/<?=$v->id?>"><?=$v->title?></a></h2>
        <p class="pub-date">Posted on: <?=$v->created?></p>
        <div class="video">
        	<?php if(!empty($v->video_path)):?>
            	<video width="640" height="360" controls="controls">
  				<source src="<?=base_url()?><?=$v->video_path?>" type="<?=$v->file_type?>" />
				<object data="<?=base_url()?><?=$v->video_path?>" width="640" height="360">
  				<embed src="<?=base_url()?><?=$v->video_path?>" width="640" height="360" />
				</object>
				</video> 
            <?php else:?>
            <iframe width="640" height="360" src="http://www.youtube.com/embed/<?=$v->youtube_link?>" frameborder="0" allowfullscreen></iframe>            
            <?php endif;?>        
        </div>
        <p><?=$v->description?></p>
     <?php endforeach?>
    </article>


	<?php if(!empty($links)):?>        
    <div class="paginate"><?=$links?></div>
    <?php endif?>

</section>