<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class DatatableAsset1 extends AssetBundle
{
   public $sourcePath = '@bower/datatables.net-dt/css';
    public $css = [
        'jquery.dataTables.min.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
