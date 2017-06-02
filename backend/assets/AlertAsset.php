<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AlertAsset extends AssetBundle
{
    public $sourcePath = '@b_vendor/alertInfo';
    public $css = [
        'ymz_box.css',
    ];
    public $js = [
    'ymz_box.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
