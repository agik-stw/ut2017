<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class PdfAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/css/pdf.css';
    public $css = [
        'pdf.css',
    ];
    public $js = [
    ];

  /*  public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];*/
}
