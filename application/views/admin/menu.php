<nav id="admin-buttons">
    <ul>
    <?php foreach ($tables as $table ): ?>
    <?php if ($table != 'ci_sessions'):?>
    <?php if ($table != 'captcha'):?>
    <?php if ($table != 'comments'):?>
    <li><a href="<?=base_url()?>admin/<?=$table?>"><?=humanize($table)?> Management</a></li>
    <?php endif;?>
    <?php endif;?>
    <?php endif;?>
    <?php endforeach; ?>
    <li><a href="<?=base_url()?>users/logout">Logout</a></li>
    </ul>
</nav>
