<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class RightclickAsset extends AssetBundle
{
   public $sourcePath = '@b_vendor/rightclick2';
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
