<?php

use app\models\system\FronterFooterInfo;
use yii\helpers\Url;

$currentUrl = mb_substr(Url::to(), 4);
$menu = FronterFooterInfo::getData();
?>
<div class="col-6 col-md">
    <h5><?=Yii::t('app', 'Information')?></h5>
    <ul class="list-unstyled text-small">
        <?php foreach ($menu as $item_page => $item_title) { ?>
            <?php if ($item_page == $currentUrl) { ?>
                <li>
                    <a href="/<?=$item_page;?>" class="text-muted" title="<?= $item_title ?>">
                        <u>
                            <?= $item_title ?>
                        </u>
                    </a>
                </li>
            <?php } else { ?>
                <li>
                    <a href="/<?=$item_page;?>" class="text-muted" title="<?= $item_title ?>">
                        <?= $item_title ?>
                    </a>
                </li>
            <?php } ?>
        <?php } ?>
    </ul>
</div>