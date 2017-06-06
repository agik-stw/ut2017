<?php

namespace backend\appjs\usedoil;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class Module extends AssetBundle
{
    public $sourcePath = '@b_appjs/usedoil';

    public $js = [
    'datatable.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
