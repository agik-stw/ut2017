<?php

namespace backend\appjs\machine_health;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class Module extends AssetBundle
{
    public $sourcePath = '@b_appjs/machine_health';
public $css = [
        'app.css',
    ];
    public $js = [
    'module.js',
    'controller.js',
    ];
}
