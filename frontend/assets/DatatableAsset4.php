<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class DatatableAsset4 extends AssetBundle
{
   public $sourcePath = '@bower/datatables.net-select-dt';
    public $css = [
        'css/select.dataTables.min.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
