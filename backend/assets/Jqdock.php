<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class Jqdock extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/plugins/jqDock.v2.0.2';
    public $css = [
        
    ];
    public $js = [
    'jquery.jqdock.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}