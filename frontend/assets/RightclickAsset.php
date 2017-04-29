<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class RightclickAsset extends AssetBundle
{
    public $sourcePath = '@vendor/main/vendor/rightclick2';
    public $css = [
        
    ];
    public $js = [
    'jquery.contextmenu.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
