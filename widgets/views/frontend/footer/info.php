<?php
use yii\helpers\Url;

$currentUrl = mb_substr(Url::to(), 4);
?>
<div class="col-6 col-md">
    <h5><?=Yii::t('app', 'Information')?></h5>
    <ul class="list-unstyled text-small">
        <li><a class="text-muted" href="<?=Url::to('/index')?>"><?=Yii::t('app', 'Home')?></a></li>
        <li><a class="text-muted" href="<?=Url::to('/guide')?>"><?=Yii::t('app', 'How to play')?></a></li>
        <li><a class="text-muted" href="<?=Url::to('/about')?>"><?=Yii::t('app', 'About')?></a></li>
        <li><a class="text-muted" href="<?=Url::to('/confidentiality')?>"><?=Yii::t('app', 'Confidentiality')?></a></li>
    </ul>
</div>