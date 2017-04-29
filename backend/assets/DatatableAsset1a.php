<?php

namespace backend\assets;

use yii\web\AssetBundle;

class DatatableAsset1a extends AssetBundle
{
   public $sourcePath = '@bower/datatables.net';
    public $css = [
     
    ];
    public $js = [
    'js/jquery.dataTables.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
