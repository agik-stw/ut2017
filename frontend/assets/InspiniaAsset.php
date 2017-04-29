<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class InspiniaAsset extends AssetBundle
{

    public $sourcePath = '@vendor/main/inspinia';
    public $css = [
       'font-awesome/css/font-awesome.css',
       'css/plugins/toastr/toastr.min.css',
       'js/plugins/gritter/jquery.gritter.css',
       'css/plugins/datapicker/datepicker3.css',
       'css/plugins/daterangepicker/daterangepicker-bs3.css',
       'css/animate.css',
       'css/style.css',
    ];
    public $js = [
   'js/plugins/metisMenu/jquery.metisMenu.js',
   'js/plugins/slimscroll/jquery.slimscroll.min.js',
   'js/plugins/flot/jquery.flot.js',
   'js/plugins/flot/jquery.flot.tooltip.min.js',
   'js/plugins/flot/jquery.flot.spline.js',
   'js/plugins/flot/jquery.flot.resize.js',
   'js/plugins/flot/jquery.flot.pie.js',
   'js/plugins/peity/jquery.peity.min.js',
   'js/demo/peity-demo.js',
   'js/inspinia.js',
   'js/plugins/pace/pace.min.js',
   'js/plugins/jquery-ui/jquery-ui.min.js',
   'js/plugins/gritter/jquery.gritter.min.js',
   'js/plugins/sparkline/jquery.sparkline.min.js',
   'js/demo/sparkline-demo.js',
   'js/plugins/chartJs/Chart.min.js',
   'js/plugins/toastr/toastr.min.js',
   'js/plugins/datapicker/bootstrap-datepicker.js',
   'js/plugins/daterangepicker/daterangepicker.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
