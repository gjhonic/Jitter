<?php

namespace app\modules\сonstructor\assets;

use yii\web\AssetBundle;

/**
 * Ассет для модуля конструктор
 */
class ConstructorAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/media/сonstructor';
    public $css = [
        'css/site.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
