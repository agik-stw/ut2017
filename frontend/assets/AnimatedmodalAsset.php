<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AnimatedmodalAsset extends AssetBundle
{
    public $sourcePath = '@vendor/main/vendor/bower/animatedmodal';
    public $css = [
        'demo/css/normalize.min.css',
        'demo/css/animate.min.css',
    ];
    public $js = [
    'demo/js/animatedModal.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
