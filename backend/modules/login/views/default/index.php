<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;
use yii\helpers\Url;
use kartik\sidenav\SideNav;
use backend\assets\LoginAsset;
LoginAsset::register($this);
use backend\assets\VueAssets;
VueAssets::register($this);
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
   <div id="vue" class="container">
        <div class="card card-container">
            
            <img width="380" id="" class="img-responsive" src="<?php echo Url::base('') . '/' . 'img/icon/pcr.png'; ?>" />
            <!-- <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" /> -->
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" method="post" action="<?php echo Url::toRoute('/login/proces/auth') ?>" id="form">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" id="inputEmail" class="form-control" name="username" placeholder="username" required autofocus v-model="username">
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required v-model="password">
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            </form><!-- /form -->
            <p style="color:red;">{{aaa}}</p>
            <p style="color:red;">{{bbb}}</p>

             <?= Yii::$app->session->hasFlash('error') ? "<p class=\"help-block help-block-error\">
                                                " . Yii::$app->session->getFlash('error') . "</p>" : '' ?>
            <!-- <a href="#" class="forgot-password">
                Forgot the password?
            </a> -->
        </div><!-- /card-container -->
    </div><!-- /container -->
    <?php JSRegister::begin([
    'key' => 'bootstrap-modal',
    'position' => \yii\web\View::POS_END
]); ?>
<script>
    var vm=new Vue({
el:'#vue',
data:{
username:'',
password:''
    },
    computed:{
  aaa:function(value){
    if (this.username=="") {
return '  Username tidak boleh kosong';
$('#btnSubmit').addClass('disabled');
  }
},
 bbb:function(value){
    if (this.password=="") {
return '  Password tidak boleh kosong';
$('#btnSubmit').addClass('disabled');
  }
}
},
ready:function(){
  if (this.username=="" || this.password=="") {
$('#btnSubmit').addClass('disabled');
  }
}
    });
</script>

<?php JSRegister::end(); ?>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>