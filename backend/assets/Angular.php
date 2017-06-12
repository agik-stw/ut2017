<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class Angular extends AssetBundle
{
    public $sourcePath = '@b_vendor/angular';
    public $js = [
    'angular.min.js',
    'angular-route.min.js',
    ];
}
