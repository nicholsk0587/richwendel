               <!-- This should display all the different blog categories -->
               <section>
                    <h2>Latest Videos</h2>
                    <ul class="plain">
                    <?php foreach($all_videos as $v):?>
                    <?php if($v->archived != '1'):?>
                        <li><h3 class="headline"><a href="/resource/video/<?=$v->id?>"><?=$v->title?></a></h3></li>
                    <?php endif?>
                    <?php endforeach?>
                        
                    </ul>
                </section>
