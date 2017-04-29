<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class AngularAsset extends AssetBundle
{
   public $sourcePath = '@bower/bower-angularjs';
    public $css = [

    ];
    public $js = [
    'angular.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
