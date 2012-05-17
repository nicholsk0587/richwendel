               <!-- This should display all the different blog categories -->
                <aside>
                    <h2>Categories</h2>
                    <ul>
                    <?php foreach ($categories as $c):?>
                        <li><a href="/resource/category/<?=$c->id?>"><?=humanize($c->title)?></a></li>
                    <?php endforeach?>
                    </ul>
                </aside>
