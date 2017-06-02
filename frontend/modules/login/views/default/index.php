<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;
use yii\helpers\Url;
use kartik\sidenav\SideNav;
use frontend\assets\AppAsset;

AppAsset::register($this);
use richardfan\widget\JSRegister;

?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>User | Login</title>
        <link rel="icon" href="<?php echo Url::base('') . '/' . 'img/icon/books.png'; ?>">
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <div class="container" style="margin-top:150px">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong> Sign in to continue</strong>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="<?php echo Url::toRoute('/login/proces/auth') ?>" method="POST">
                            <fieldset>
                                <div class="row">
                                    <div class="center-block">
                                        <img class="profile-img"
                                             src="<?php echo Url::base('') . '/' . 'img/user.png'; ?>" alt="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-10  col-md-offset-1 ">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="glyphicon glyphicon-user"></i>
                                                </span>
                                                <input class="form-control" placeholder="Username" name="username"
                                                       type="text" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="glyphicon glyphicon-lock"></i>
                                                </span>
                                                <input class="form-control" placeholder="Password" name="password"
                                                       type="password" value="">
                                            </div>
                                            <?= Yii::$app->session->hasFlash('error') ? "<p class=\"help-block help-block-error\">
                                                " . Yii::$app->session->getFlash('error') . "</p>" : '' ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-lg btn-primary btn-block"
                                                   value="Sign in">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>

                    </div>
                    <div class="panel-footer ">
                        <!--  Don't have an account! <a href="#" onClick=""> Sign Up Here </a> -->
                        <b>Petrolab Report</b>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>