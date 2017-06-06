<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;
use yii\helpers\Url;
use kartik\sidenav\SideNav;
use backend\assets\LoginAsset;
LoginAsset::register($this);
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
   <div class="container">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img width="380" id="" class="img-responsive" src="<?php echo Url::base('') . '/' . 'img/icon/pcr.png'; ?>" />
            <!-- <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" /> -->
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" method="post" action="<?php echo Url::toRoute('/login/proces/auth') ?>">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" id="inputEmail" class="form-control" name="username" placeholder="username" required autofocus>
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            </form><!-- /form -->
             <?= Yii::$app->session->hasFlash('error') ? "<p class=\"help-block help-block-error\">
                                                " . Yii::$app->session->getFlash('error') . "</p>" : '' ?>
            <!-- <a href="#" class="forgot-password">
                Forgot the password?
            </a> -->
        </div><!-- /card-container -->
    </div><!-- /container -->
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>