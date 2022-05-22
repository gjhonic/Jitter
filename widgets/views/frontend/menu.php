<?php

/** @var array $navs */

$navsPage = $navs['navs'];
$navsAuth = $navs['auth'];

?>

<nav class="my-2 my-md-0 mr-md-3">
    <?php foreach ($navsPage as $item) { ?>
        <a class="p-2 text-dark" href="<?=$item['url']?>"><?=$item['title']?></a>
    <?php } ?>
</nav>

<nav class="my-2 my-md-0 mr-md-3">
    <?php foreach ($navsAuth as $item) { ?>
        <a class="btn btn-outline-primary" href="<?=$item['url']?>"><?=$item['title']?></a>
    <?php } ?>
</nav>

