<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;
use yii\helpers\Url;
/*use kartik\sidenav\SideNav;*/
/*use frontend\assets\InspiniaAsset;
InspiniaAsset::register($this);*/
use frontend\assets\AppAsset;
AppAsset::register($this);

use richardfan\widget\JSRegister;
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>

	<?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="container">
<h4>View New Oil</h4>
<div style="width: 100%; height: 3px; background-color: black;"></div>
<div class="row">
<div class="col-md-6">
<h5 class="row"><div class="col-md-3"> Analysis Id</div><div class="col-md-9"> <b><?php echo $data['analysis_id']; ?></b></div></h5>
<h5 class="row"><div class="col-md-3">Analysis Date</div><div class="col-md-9"> <b><?php echo $data['analysis_date']; ?></b></div></h5>
<h5 class="row"><div class="col-md-3">Group</div><div class="col-md-9"> <b><?php echo $data['group']; ?></b></div></h5>
<h5 class="row"><div class="col-md-3">Customer</div><div class="col-md-9"><b> <?php echo $data['customer_id']; ?></b></div></h5>
<h5 class="row"><div class="col-md-3">Lab Number</div><div class="col-md-9"><b> <?php echo $data['lab_number']; ?></b></div></h5>
<h5 class="row"><div class="col-md-3">Sample Name</div><div class="col-md-9"><b><?php echo $data['sample_name']; ?></b></div></h5>
<h5 class="row"><div class="col-md-3">Running Hours of Oil</div><div class="col-md-9"><b><?php echo $data['running_hours_of_oil']; ?></b></div></h5>

</div>

<div class="col-md-6">
<h5 class="row"><div class="col-md-3">Running Hours</div><div class="col-md-9"><b><?php echo $data['running_hours']; ?></b></div></h5>
<h5 class="row"><div class="col-md-3">Engine Builder</div><div class="col-md-9"><b><?php echo $data['engine_builder']; ?></b></div></h5>
<h5 class="row"><div class="col-md-3">Engine Model</div><div class="col-md-9"><b><?php echo $data['engine_model']; ?></b></div></h5>
<h5 class="row"><div class="col-md-3">Serial Number</div><div class="col-md-9"><b><?php echo $data['serial_number']; ?></b></div></h5>
<h5 class="row"><div class="col-md-3">Engine Location</div><div class="col-md-9"><b><?php echo $data['engine_location']; ?></b></div></h5>
<h5 class="row"><div class="col-md-3">FIle Name</div><div class="col-md-9"><b><?php echo $data['file_upload']; ?></b></div></h5>
</div>
</div>
<div style="width: 100%; height: 3px; background-color: black;"></div>
<h5>PDF</h5>
<embed src="<?php echo Url::toRoute('/monitoring/new_oil/report/openpdf?file=').$data['file_upload']; ?>" width="1200" height="800" />
</div>

<?php $this->endBody() ?>
</body>
</html>

<?php JSRegister::begin(); ?>
<script>

</script>
<?php JSRegister::end(); ?>

<?php $this->endPage() ?>
