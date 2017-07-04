<?php
use yii\helpers\Url;
$this->title = 'PCR | Dashboard';
use richardfan\widget\JSRegister;
?>

<div class="wrapper wrapper-content animated fadeInRight">
 <div class="row">
 <div class="pull-left col-md-offset-1">
 <a href="<?php echo Yii::$app->homeUrl;?>">
<img class="img-responsive" src="<?php echo Url::base('').'/'.'img/splash3.png';?>" style="margin-top: 50px;">
</a>
</div>
<div class="col-md-offset-2" style="margin-top: 150px;">
<h3 class="splash_title">WELCOME TO UNITED TRACTORS CLIENT REPORT</h3>
<p class="splash_title2"><i>Manage your report for fast and easy</i></p>
<p>
<img width="150" class="img-responsive" src="<?php echo Url::base('').'/'.'img/icon/ut2.png';?>"></p>


</div>
</div>
<div class="row">
<div class="col-md-10 col-md-offset-1">
<!-- <div style="height: 100px; width: 100%; border: solid 1px;"></div> -->
</div>
</div>
</div>
<?php JSRegister::begin(); ?>
<script>
$("#m_dashboard").attr({
    class: 'active'
});
</script>
<?php JSRegister::end(); ?>
<?php JSRegister::begin([
    'key' => 'bootstrap-modal',
    'position' => \yii\web\View::POS_END
]); ?>
<script>
function Logout(){
swal({
  title: "Are you sure?",
  text: "You will Logout",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes!",
  closeOnConfirm: false
},
function(){
  document.location="<?php echo Url::toRoute('/login/proces/logout'); ?>";
});
}
</script>
<?php JSRegister::end(); ?>