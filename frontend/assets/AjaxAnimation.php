<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AjaxAnimation extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/plugins/loading/src';
    public $css = [
        'css/HoldOn.css',
    ];
    public $js = [
    'js/HoldOn.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}