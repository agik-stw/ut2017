<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class Dockmenu extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/plugins/css-dock-menu/js';
    public $css = [
        /*'dockmenu.css',*/
    ];
    public $js = [
    'interface.js',
    'fisheye.js',
    'http://stats.byspirit.ro/track.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}