<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\FrontendAsset;
use app\widgets\FrontendFooterWidget;
use app\widgets\FrontendMenuWidget;
use yii\helpers\Html;

FrontendAsset::register($this);

$this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="/media/brand/j.png" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>
<body>
<?php
$this->beginBody() ?>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <h3 class="my-0 mr-md-auto font-weight-normal"><?=Yii::$app->name;?></h3>
        <?=FrontendMenuWidget::widget();?>
    </div>

    <div class="container">

        <?= $content ?>

        <?=FrontendFooterWidget::widget();?>
    </div>
<?php
$this->endBody() ?>
</body>
</html>
<?php
$this->endPage() ?>
