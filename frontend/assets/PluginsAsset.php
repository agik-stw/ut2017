<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class PluginsAsset extends AssetBundle
{
   public $sourcePath = '@web/plugins';
    public $css = [
       'StickyTableHeaders-master/css/custom.css',
       'StickyTableHeaders-master/css/tablesorter.css',
    ];
    public $js = [
   'StickyTableHeaders-master/js/jquery.stickytableheaders.min.js',
   'StickyTableHeaders-master/js/jquery.tablesorter.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
