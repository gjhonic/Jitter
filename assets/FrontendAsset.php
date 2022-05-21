<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * FrontendAsset ассеты
 */
class FrontendAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/media/frontend';
    public $css = [
        'css/bootstrap.min.css',
        'css/style.css',
        'font-awesome/css/font-awesome.css',
    ];
    public $js = [
    ];
    public $depends = [

    ];
}
