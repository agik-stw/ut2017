<?php

namespace backend\assets;

use yii\web\AssetBundle;

class DatatableAsset5 extends AssetBundle
{
   public $sourcePath = '@bower/datatables.net-select';
    public $css = [
    ];
    public $js = [
    'js/dataTables.select.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
