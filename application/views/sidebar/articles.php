               <!-- This should display the 5 most recent articles from whatever category we are in. E.g. if on the OHIO DUI page, the 5 most recent stories in that category-->              
                <section>
                    <h2>Related Articles</h2>
                    <ul class="plain">
                    <?php foreach ($all_blogs as $b):?>
	    				<?php 
	    					$d = explode('-', $b->published_date);
							$date = date("F d, Y", mktime(0,0,0,$d[1],substr($d[2],0,2),$d[0])); 
						?>
                        <li><p class="headline-date"><?=$date?></p><h3 class="headline"><a href="/resource/article/<?=$b->id?>"><?=$b->title?></a></h3></li>
                    <?php endforeach?>
                    </ul>
                </section>
