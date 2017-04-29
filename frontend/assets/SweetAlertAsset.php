<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class SweetAlertAsset extends AssetBundle
{
   public $sourcePath = '@bower/sweetalert/dist';
    public $css = [
        'sweetalert.css',
    ];
    public $js = [
    'sweetalert.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
