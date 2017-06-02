<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class PluginsAsset extends AssetBundle
{
   public $sourcePath = '@web/plugins/StickyTableHeaders-master';
    public $css = [
       'css/custom.css',
       'css/tablesorter.css',
    ];
    public $js = [
   'js/jquery.stickytableheaders.min.js',
   'js/jquery.tablesorter.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
