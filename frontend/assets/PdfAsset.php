<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class PdfAsset extends AssetBundle
{
    public $sourcePath = '@f_vendor/pdf';
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
