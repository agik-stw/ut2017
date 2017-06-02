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
<h4>View Fuel</h4>
<div style="width: 100%; height: 3px; background-color: black;"></div>
<div class="row">
<div class="col-md-6">
<h5 class="row"><div class="col-md-3"> Report Id</div><div class="col-md-9"> <b><?php echo $data['report_id']; ?></b></div></h5>
<h5 class="row"><div class="col-md-3">Report Date</div><div class="col-md-9"> <b><?php echo $data['report_date']; ?></b></div></h5>
<h5 class="row"><div class="col-md-3">Group</div><div class="col-md-9"> <b><?php echo $data['group']; ?></b></div></h5>
<h5 class="row"><div class="col-md-3">Customer</div><div class="col-md-9"><b> <?php echo $data['customer_id']; ?></b></div></h5>
<h5 class="row"><div class="col-md-3">Departement</div><div class="col-md-9"><b><?php echo $data['departement_id']; ?></b></div></h5>
<h5 class="row"><div class="col-md-3">Lab Number</div><div class="col-md-9"><b> <?php echo $data['lab_number']; ?></b></div></h5>
</div>

<div class="col-md-6">
<h5 class="row"><div class="col-md-3">Job Number</div><div class="col-md-9"><b><?php echo $data['Job_number']; ?></b></div></h5>
<h5 class="row"><div class="col-md-3">Detail of Sample</div><div class="col-md-9"><b><?php echo $data['detail_of_sample']; ?></b></div></h5>
<h5 class="row"><div class="col-md-3">Target Lead Time</div><div class="col-md-9"><b><?php echo $data['target_lead_time']; ?></b></div></h5>
<h5 class="row"><div class="col-md-3">Actual Lead Time</div><div class="col-md-9"><b><?php echo $data['actual_lead_time']; ?></b></div></h5>
<h5 class="row"><div class="col-md-3">Alert</div><div class="col-md-9"><b><?php echo $data['Alert']; ?></b></div></h5>
<h5 class="row"><div class="col-md-3">FIle Name</div><div class="col-md-9"><b><?php echo $data['file_upload']; ?></b></div></h5>
</div>
</div>
<div style="width: 100%; height: 3px; background-color: black;"></div>
<h5>PDF</h5>

<embed src="<?php echo Yii::$app->backendDoor->createUrl('/monitoring/fuel/report/openpdf?file=').$data['file_upload']; ?>" width="1200" height="800" />

<?php $this->endBody() ?>
</body>
</html>

<?php JSRegister::begin(); ?>
<script>

</script>
<?php JSRegister::end(); ?>

<?php $this->endPage() ?>
