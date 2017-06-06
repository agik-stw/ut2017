<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class VueAssets extends AssetBundle
{
   public $sourcePath = '@bower/vue/dist';
    public $css = [
        /*'sweetalert.css',*/
    ];
    public $js = [
    'vue.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
