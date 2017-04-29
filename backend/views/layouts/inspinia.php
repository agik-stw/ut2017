<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;
use yii\helpers\Url;
use kartik\sidenav\SideNav;
use backend\assets\InspiniaAsset;
InspiniaAsset::register($this);
use backend\assets\BootstrapAsset;
BootstrapAsset::register($this);
use backend\assets\AppAsset;
AppAsset::register($this);
use backend\assets\DatatableAsset1;
DatatableAsset1::register($this);
use backend\assets\DatatableAsset1a;
DatatableAsset1a::register($this);
use backend\assets\DatatableAsset2;
DatatableAsset2::register($this);
use backend\assets\DatatableAsset3;
DatatableAsset3::register($this);
use backend\assets\DatatableAsset4;
DatatableAsset4::register($this);
use backend\assets\DatatableAsset5;
DatatableAsset5::register($this);
use backend\assets\BowerwebAsset;
BowerwebAsset::register($this);
use backend\assets\AlertAsset;
AlertAsset::register($this);
use backend\assets\RightclickAsset;
RightclickAsset::register($this);
use backend\assets\SweetAlertAsset;
SweetAlertAsset::register($this);
use backend\components\inspinia\InsBreadcrumbs;
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
                                <li><a href="<?php echo Url::toRoute('/login/proces/logout'); ?>">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            IN+
                        </div>
                    </li>
                    <li>

                    <li class="<?php if ($url=='') {
                        echo 'active';
                    } ?>" id="view_data"><a href="<?php echo Yii::$app->homeUrl;?>"><img alt="image" src="<?php echo Url::base('').'/'.'img/icon/home.png';?>" /> <span class="nav-label">Home </span></a></li>


                    <li class="<?php if ($url=='user') {
                        echo 'active';
                    }else{echo 'inactive';} ?>" id="view_data"><a href="<?php echo Url::toRoute('/user') ?>" data-toggle="tooltip" title="Please click for Action"><img alt="image" src="<?php echo Url::base('').'/'.'img/icon/users.png';?>" />  <span class="nav-label">User</span></a></li>

                </li>

                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-fixed-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-link" href="#"><img alt="image" src="<?php echo Url::base('').'/'.'img/icon/chocolate-milk.png';?>" /></i> </a>
            <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <a href="<?php echo Yii::$app->homeUrl;?>"><span class="m-r-sm text-muted welcome-message"><big class="bold">Petrolab Client Report</big></span></a>
                </li>

                <li>
                    <a href="<?php echo Url::toRoute('/login/proces/logout'); ?>">
                        <img alt="image" src="<?php echo Url::base('').'/'.'img/icon/arrow-curve-000-double.png';?>" /> Log out
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
