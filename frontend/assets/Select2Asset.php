<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class Select2Asset extends AssetBundle
{
    public $sourcePath = '@f_bower/select2/dist';
    public $css = [
        'css/select2.min.css',
    ];
    public $js = [
    'js/select2.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
