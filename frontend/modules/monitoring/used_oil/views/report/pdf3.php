<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;
use yii\helpers\Url;
use kartik\sidenav\SideNav;
/*use frontend\assets\InspiniaAsset;
InspiniaAsset::register($this);*/
/*use frontend\assets\BootstrapAsset;
BootstrapAsset::register($this);*/
/*use frontend\assets\AppAsset;
AppAsset::register($this);*/
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
	
	<?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="">
<canvas>
<table width="1200">
	<tr>
		<td>
			<img width="400" src="<?php echo Url::base('').'/'.'img/logo2.png';?>">
		</td>
		<td width="100"></td>
		
		<td width="100"></td>
		<td width="100"></td>
		<td width="50"></td>
		<td width="50"></td>
		<td width="50"></td>
		<td width="50"></td>
				<td width="0">
			<img width="180" src="<?php echo Url::base('').'/'.'img/kan.jpg';?>">
		</td>
		
	</tr>
</table>

<table width="1200">
	<tr>
		<td colspan="12" style="width: 100%; height: 1px; background-color: black;">
		</td>
	</tr>

<tr>
<td>Customer Name : <?php echo $data->name; ?></td>
<td>For Attention : <?php echo $data->name; ?></td>
</tr>
<tr>
<td>For Attention : <?php echo $data->name; ?></td>
<td>Customer Name : PT. INTI LINGGA SEJAHTERA</td>
</tr>
<tr>
<td>Adress    : <?php echo $data->address; ?></td>
<td>Customer Name : PT. INTI LINGGA SEJAHTERA</td>
</tr>
<tr>
<td>Unit Model : <?php echo $data->model; ?></td>
<td>Customer Name : PT. INTI LINGGA SEJAHTERA</td>
</tr>
<tr>
<td>Unit Number : <?php echo $data->unit_no; ?></td>
</tr>

	<tr>
		<td colspan="12" style="width: 100%; height: 2px; background-color: black;">
		</td>
	</tr>

	<tr style="font-size: 15px; background-color: #f5f5f0;">
		<td width="200" colspan="11"><b>TEST DETAILS</b></td>
		<td width="150" style="background-color: #f5f5f0;">
		Overall Analysis Result:
		</td>
	</tr>
	<tr>
		<td width="200">TEST DETAILS</td>
		<td width="50"></td>
		<td width="50"></td>
		<td width="50"></td>
		<td width="50"></td>
		<td width="100"></td>
		<td width="100"></td>
		<td width="100"></td>
		<td width="100"></td>
		<td width="100"></td>
		<td width="100"></td>
		<td rowspan="6">
			<img width="70" src="<?php echo Url::base('').'/'.'img/logominyak.png';?>">
		</td>
	</tr>
	<tr>
		<td colspan="8" width="200">TEST DETAILS</td>
		<td width="50"></td>
		<td width="50"></td>
		<td width="100"></td>
		<td width="100"></td>
		<td width="100"></td>
		<td width="100"></td>
		<td width="100"></td>
		<td width="100"></td>
		<td></td>
	</tr>
	<tr>
		<td colspan="8" width="200">TEST DETAILS</td>
		<td width="50"></td>
		<td width="50"></td>
		<td width="100"></td>
		<td width="100"></td>
		<td width="100"></td>
		<td width="100"></td>
		<td width="100"></td>
		<td width="100"></td>
		<td></td>
	</tr>
	<tr>
		<td colspan="8" width="200">TEST DETAILS</td>
		<td width="50"></td>
		<td width="50"></td>
		<td width="100"></td>
		<td width="100"></td>
		<td width="100"></td>
		<td width="100"></td>
		<td width="100"></td>
		<td width="100"></td>
		<td></td>
	</tr>
	<tr>
		<td colspan="8" width="200">TEST DETAILS</td>
		<td width="50"></td>
		<td width="50"></td>
		<td width="100"></td>
		<td width="100"></td>
		<td width="100"></td>
		<td width="100"></td>
		<td width="100"></td>
		<td width="100"></td>
		<td></td>
	</tr>
	<tr>
		<td colspan="8" width="200">TEST DETAILS</td>
		<td width="50"></td>
		<td width="50"></td>
		<td width="100"></td>
		<td width="100"></td>
		<td width="100"></td>
		<td width="100"></td>
		<td width="100"></td>
		<td width="100"></td>
		<td></td>
	</tr>
	<tr>
		<td width="200">TEST DETAILS</td>
		<td width="50"></td>
		<td width="50"></td>
		<td width="100"></td>
		<td width="100"></td>
		<td width="100"></td>
		<td width="100"></td>
		<td width="100"></td>
		<td width="100"></td>
		<td width="100"></td>
		<td width="100"></td>
		<td><b>SEVERE</b></td>
	</tr>

	<tr align="left" style="background-color: #f5f5f0;">
		<th width="200">Physical Test</th>
		<th width="50">Unit</th>
		<th width="100">Method</th>
		<th width="100"></th>
		<th width="100"></th>
		<th width="100">Test Value</th>
		<th width="100"></th>
		<th width="100"></th>
		<th width="100"></th>
		<th width="100"></th>
	</tr>
	<tr>
		<td width="200">Visc@40C (*)</td>
		<td width="50">Visc@40C (*)</td>
		<td width="100">Visc@40C (*)</td>
		<td width="100"><td width="100">Visc@40C (*)</td></td>
		<td width="100"><td width="100">Visc@40C (*)</td></td>
		<td width="100">Visc@40C (*)</td>
	</tr>
</table>


</div>
<?php $this->endBody() ?> 
</body>
</html>
<?php $this->endPage() ?>