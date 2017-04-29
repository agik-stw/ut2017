<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class DatatableAsset3 extends AssetBundle
{
   public $sourcePath = '@bower/datatables.net-buttons';
    public $css = [
        
    ];
    public $js = [
    'js/dataTables.buttons.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
