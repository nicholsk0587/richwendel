                <section>
                    <h2>News &amp; Updates</h2>
                    <ul class="plain">
                    <?php foreach($blogs as $b):?>
                        <li><p class="headline-date"><?=$b->published_date?></p><h3 class="headline"><a href="/resource/article/<?=$b->id?>"><?=$b->title?></a></h3></li>
                    <?php endforeach?>
                    </ul>
                </section>
