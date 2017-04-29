<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class EasytbAsset extends AssetBundle
{
    public $sourcePath = '@vendor/main/vendor/easyTable';
    public $css = [
        'easyTable.css',
    ];
    public $js = [
    'easyTable.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
