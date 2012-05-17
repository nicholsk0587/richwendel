               <!-- This should display blogs/news by months -->
               
                <aside>
                    <h2>Archives</h2>
                    <ul>
                    <?php foreach($archived as $k => $a):?>
                        <li><a href="/resource/archive/<?=str_replace(' ','_',$k)?>"><?=$k?></a></li>
                    <?php endforeach?>
                    </ul>
                </aside>
