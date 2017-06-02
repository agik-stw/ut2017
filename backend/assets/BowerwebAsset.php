<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class BowerwebAsset extends AssetBundle
{
    public $sourcePath = '@b_bower';
    public $css = [
        'animatedmodal/demo/css/normalize.min.css',
        'animatedmodal/demo/css/animate.min.css',
        'c3/c3.min.css',
        'select2/dist/css/select2.min.css',

    ];
    public $js = [
    'animatedmodal/demo/js/animatedModal.min.js',
    'd3/d3.min.js',
   'c3/c3.min.js',
   'select2/dist/js/select2.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
