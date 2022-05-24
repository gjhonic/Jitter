<?php
use yii\helpers\Url;
use app\models\system\Lang;

$lang = Yii::$app->language;
$currentUrl = mb_substr(Url::to(), 4);

$langs = Lang::getDataLangs()
?>

<div class="col-6 col-md">
    <h5><?=Yii::t('app', 'Languages')?></h5>
    <ul class="list-unstyled text-small">
    <?php foreach($langs as $lang_id => $item) { ?>
        <?php if (($lang === $lang_id)) { ?>
            <li>
                <a href="/<?=$lang_id;?>/<?= $currentUrl ?>" class="text-muted" title="<?= $item['title'] ?>">
                    <u>
                        <?= $item['title'] ?>
                    </u>
                </a>
            </li>
        <?php } else { ?>
            <li>
                <a href="/<?=$lang_id;?>/<?= $currentUrl ?>" class="text-muted" title="<?= $item['title'] ?>">
                    <?= $item['title'] ?>
                </a>
            </li>
        <?php } ?>
    <?php } ?>
    </ul>
</div>