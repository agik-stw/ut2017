<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;
use yii\helpers\Url;
use kartik\sidenav\SideNav;
use frontend\assets\InspiniaAsset;
InspiniaAsset::register($this);
use frontend\assets\BootstrapAsset;
BootstrapAsset::register($this);
use frontend\assets\AppAsset;
AppAsset::register($this);
use frontend\assets\DatatableAsset1;
DatatableAsset1::register($this);
use frontend\assets\DatatableAsset1a;
DatatableAsset1a::register($this);
use frontend\assets\DatatableAsset2;
DatatableAsset2::register($this);
use frontend\assets\DatatableAsset3;
DatatableAsset3::register($this);
use frontend\assets\DatatableAsset4;
DatatableAsset4::register($this);
use frontend\assets\DatatableAsset5;
DatatableAsset5::register($this);
use frontend\assets\BowerwebAsset;
BowerwebAsset::register($this);
use frontend\assets\AlertAsset;
AlertAsset::register($this);
use frontend\assets\RightclickAsset;
RightclickAsset::register($this);
use frontend\assets\SweetAlertAsset;
SweetAlertAsset::register($this);
use frontend\assets\AjaxAnimation;
AjaxAnimation::register($this);
use frontend\components\inspinia\InsBreadcrumbs;
use richardfan\widget\JSRegister;
$moduleurl=Yii::$app->urlManager->parseRequest(Yii::$app->request);
$url=$moduleurl[0];

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>

<head>

   <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
  <title><?= Html::encode($this->title) ?></title>
  <link rel="icon" href="<?php echo Url::base('').'/'.'img/icon/books.png';?>">
  <?php $this->head() ?>
</head>

<body class="fixed-sidebar fixed-nav fixed-nav-basic">
<?php $this->beginBody() ?>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
<ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" width="60" class="img-circle" src="<?php echo Url::base('').'/'.'img/profile/user.jpg';?>" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo Yii::$app->session['name']; ?></strong>
                             </span> <span class="text-muted text-xs block"><?php echo Yii::$app->session['level_name']; ?> <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <!-- <li><a href="profile.html">Profile</a></li>
                                <li><a href="contacts.html">Contacts</a></li>
                                <li><a href="mailbox.html">Mailbox</a></li> -->
                                <li class="divider"></li>
                                <li><a href="#" onclick="Logout();">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            IN+
                        </div>
                    </li>
                    <li>

                    <li class="<?php if ($url==Yii::$app->homeUrl) {
                        echo 'active';
                    } ?>" id="view_data"><a href="<?php Yii::$app->homeUrl;?>"><img alt="image" src="<?php echo Url::base('').'/'.'img/icon/home.png';?>" /> <span class="nav-label">Home</span></a></li>

                         <li class="menu_active" id="menu">
                    <a href="#"><img alt="image" src="<?php echo Url::base('').'/'.'img/icon/resource-monitor.png';?>" /> <span class="nav-label">Dashboards</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                    <li id="view_data"><a href="<?php echo Url::base('');?>/lube/action/view"><img alt="image" src="<?php echo Url::base('').'/'.'img/icon/next.png';?>" /> <span class="nav-label">Dashboard MFC</span></a></li>
                        <li><a href="ecommerce_products_grid.html"><img alt="image" src="<?php echo Url::base('').'/'.'img/icon/next.png';?>" /> <span class="nav-label">Dashboard MFC 2</span></a></li>
                    </ul>
                </li>
                       
                       <li class="<?php if ($url=='monitoring/used_oil') {
                        echo 'active';
                    }elseif($url=='monitoring/fuel'){
                        echo 'active';
                    }elseif($url=='monitoring/new_oil'){
                        echo 'active';
                    }
                    elseif($url=='monitoring/unit_no_history'){
                        echo 'active';
                    }
                    elseif($url=='monitoring/machine_health'){
                        echo 'active';
                    }
                        ?>" id="menu">
                    <a href="#"><img alt="image" src="<?php echo Url::base('').'/'.'img/icon/monitor.png';?>" /> <span class="nav-label">Monitoring</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">

                    <li class="<?php if ($url=='monitoring/used_oil') {
                        echo 'active';
                    }else{echo 'inactive';} ?>" id="view_data"><a href="<?php echo Url::toRoute('/monitoring/used_oil') ?>" data-toggle="tooltip" title="Please click for Action"><img alt="image" src="<?php echo Url::base('').'/'.'img/icon/next.png';?>" />  <span class="nav-label">Used Oil</span></a></li>

                    <li class="<?php if ($url=='monitoring/fuel') {
                        echo 'active';
                    }else{echo 'inactive';} ?>" id="view_data"><a href="<?php echo Url::toRoute('/monitoring/fuel') ?>"><img alt="image" src="<?php echo Url::base('').'/'.'img/icon/next.png';?>" />  <span class="nav-label">Fuel</span></a></li>

                        <li class="<?php if ($url=='monitoring/new_oil') {
                        echo 'active';
                    }else{echo 'inactive';} ?>"><a href="#<?php /*echo Url::toRoute('/monitoring/new_oil')*/ ?>"><img alt="image" src="<?php echo Url::base('').'/'.'img/icon/next.png';?>" />  <span class="nav-label">New Oil & Others</span></a></li>

                        <li class="<?php if ($url=='monitoring/unit_no_history') {
                        echo 'active';
                    }else{echo 'inactive';} ?>"><a href="#<?php /*echo Url::toRoute('/monitoring/unit_no_history')*/ ?>"><img alt="image" src="<?php echo Url::base('').'/'.'img/icon/next.png';?>" /> </i> <span class="nav-label">UnitNo History</span></a></li>

                         <li class="<?php if ($url=='monitoring/machine_health') {
                        echo 'active';
                    }else{echo 'inactive';} ?>"><a href="#<?php /*echo Url::toRoute('/monitoring/machine_health')*/ ?>"><img alt="image" src="<?php echo Url::base('').'/'.'img/icon/next.png';?>" />  <span class="nav-label">Machine Health</span></a></li>

                          <li><a href="#"><img alt="image" src="<?php echo Url::base('').'/'.'img/icon/next.png';?>" />  <span class="nav-label">Component Health</span></a></li>

                           <li><a href="#"><img alt="image" src="<?php echo Url::base('').'/'.'img/icon/next.png';?>" />  <span class="nav-label">Machine Comp.</span></a></li>

                           <li><a href="#"><img alt="image" src="<?php echo Url::base('').'/'.'img/icon/next.png';?>" />  <span class="nav-label">Consistency History</span></a></li>

                    </ul>
                </li>

                <li><a href="ecommerce_products_grid.html"><img alt="image" src="<?php echo Url::base('').'/'.'img/icon/truck.png';?>" /> <span class="nav-label">Sample Tracking</span></a></li>

                </li>

                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-fixed-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-link" href="#"><img alt="image" src="<?php echo Url::base('').'/'.'img/icon/chocolate-milk.png';?>" /></i> </a>
           
        </div>

            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <a href="<?php echo Yii::$app->homeUrl;?>"><span class="m-r-sm text-muted welcome-message"><big class="bold">Petrolab Client Report</big></span></a>
                </li>
<li>
                    <a href="#"  data-toggle="tooltip" title="Help center">
                        <img alt="image" src="<?php echo Url::base('').'/'.'img/icon/help.png';?>" /> Help
                    </a>
                </li>
                <li>
                    <a href="#" data-toggle="tooltip" title="Logout from application" onclick="Logout();">
                        <img alt="image" src="<?php echo Url::base('').'/'.'img/icon/logout.png';?>" /> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>

                      <!--content................................................ -->
        <!--breadcrumbs-->
<?php /*InsBreadcrumbs::beginBread('Home','h2');*/ ?>
<!-- <li><a href="#">Home</a></li> -->
<?php /*InsBreadcrumbs::endBread();*/ ?>
            <!--breadcrumbs-->
<?=$content?>

        <!--content................................................ -->
        </div>

        <div class="fixed footer">

                    <div>
                        <strong>Copyright</strong> <a href="http://www.petrolab.co.id" target="_blank">petrolab.co.id &copy; </a><?php echo date('Y'); ?>
                        <i class="pull-right">Powered by teamIT-petrolab</i>
                    </div>
                </div>

    </div>

     <?php $this->endBody() ?> 
</body>
</html>
<?php $this->endPage() ?>



