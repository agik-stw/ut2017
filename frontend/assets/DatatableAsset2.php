<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class DatatableAsset2 extends AssetBundle
{
   public $sourcePath = '@bower/datatables.net-buttons-dt';
    public $css = [
        'css/buttons.dataTables.min.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
