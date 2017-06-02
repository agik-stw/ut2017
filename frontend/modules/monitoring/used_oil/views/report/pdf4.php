<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;
use yii\helpers\Url;
use kartik\sidenav\SideNav;
/*use frontend\assets\InspiniaAsset;
InspiniaAsset::register($this);*/
/*use frontend\assets\AppAsset;
AppAsset::register($this);
use frontend\assets\ChartAsset;
ChartAsset::register($this);*/
use frontend\assets\PdfAsset;
PdfAsset::register($this);
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
<div style="width: 1000px;">
<table class="">
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
			<img width="180" src="<?php echo Url::base('').'/'.'img/kan.png';?>">
		</td>
		
	</tr>
</table>
<div style="height: 1.4px; background-color: black;"></div>

<table class="tb-body">
	<tr>
		<td width="150">
			<ul>
	<li style="list-style: none;" class="_12px">Customer Name</li>
	<li style="list-style: none;" class="_12px">For Attention</li>
	<li style="list-style: none;" class="_12px">Address</li>
	<li style="list-style: none;" class="_12px">Unit Model</li>
	<li style="list-style: none;" class="_12px">Unit Number</li>
</ul>
		</td>
		<td width="500">
			<ul>
	<li style="list-style: none;" class="_12px">:&nbsp;<?php echo $data->name; ?></li>
	<li style="list-style: none;" class="_12px">:&nbsp;<?php echo $data->name; ?></li>
	<li style="list-style: none;" class="_12px">:&nbsp;<?php echo $data->address; ?></li>
	<li style="list-style: none;" class="_12px">:&nbsp;<?php echo $data->model; ?></li>
	<li style="list-style: none;" class="_12px">:&nbsp;<?php echo $data->unit_no; ?></li>
</ul>
		</td>
			<td width="200">
			<ul>
	<li style="list-style: none;" class="_12px">Component</li>
	<li style="list-style: none;" class="_12px">Component Matrix</li>
	<li style="list-style: none;" class="_12px">Oil Matrix</li>
	<li style="list-style: none;" class="_12px">Lube Oil Name</li>
</ul>
		</td>
		<td width="500">
			<ul>
	<li style="list-style: none;" class="_12px">:&nbsp;<?php echo $data->component; ?></li>
	<li style="list-style: none;" class="_12px">:&nbsp;<?php echo $data->name; ?></li>
	<li style="list-style: none;" class="_12px">:&nbsp;<?php echo $data->oil_matrix; ?></li>
	<li style="list-style: none;" class="_12px">:&nbsp;<?php echo $data->oil_type; ?></li>
</ul>
		</td>
	</tr>
</table>

<div style="height: 1.7px; background-color: black;"></div>

<table width="1000" class="">
	<tr class="border-tb">
	<div class="bg_td">
		<td height="20" width="293" class="th_bold  _14px">Test Detail</td>
		<td width="95" class="th_bold"></td>
		<td width="95" class="th_bold"></td>
		<td width="95" class="th_bold"></td>
		<td width="105" class="th_bold"></td>
		<td width="105" class="th_bold"></td>
		</div>
		<td class="_13px th_bold" width="150" class="th_bold">Overall Analysis Result:</td>
	</tr>

	<tr class="border-tb">
	<div class="bg_td">
		<td width="293" class="_13px tb-body">Lab. Number</td>
		<td width="95" class="center _13px tb-body"><?php echo $data->lab_no; ?></td>
		<td width="95" class="center _13px tb-body"><?php echo $data->lab_no; ?></td>
		<td width="95" class="_13px tb-body"></td>
		<td width="105" class="_13px tb-body"></td>
		<td width="105" class="_13px tb-body"></td>


		</div>
		<td rowspan="7" width="170" class="urgent">
			<img id="logominyak" width="60" src="<?php echo Url::base('').'/'.'img/logominyak.png';?>">
		</td>
	</tr>

		<tr class="border-tb">
	<div class="bg_td">
		<td width="293" class="_13px tb-body">Sampling Date</td>
		<td width="95" class="center _13px tb-body"><?php echo $data->sampl_dt1; ?></td>
		<td width="95" class="center _13px tb-body"><?php echo $data->sampl_dt1; ?></td>
		<td width="95" class="_13px tb-body"></td>
		<td width="95" class="_13px tb-body"></td>
		<td width="105" class="_13px tb-body"></td>
		</div>
	</tr>

	<tr class="border-tb">
	<div class="bg_td">
		<td width="293" class="_13px tb-body">Received Date</td>
		<td width="95" class="center _13px tb-body"><?php echo $data->recv_dt1; ?></td>
		<td width="95" class="center _13px tb-body"><?php echo $data->recv_dt1; ?></td>
		<td width="95" class="_13px tb-body"></td>
		<td width="95" class="_13px tb-body"></td>
		<td width="105" class="_13px tb-body"></td>
		</div>
	</tr>

<tr class="border-tb">
	<div class="bg_td">
	<td width="293" class="_13px tb-body">Report Date</td>
		<td width="95" class="center _13px tb-body"><?php echo $data->rpt_dt1; ?></td>
		<td width="95" class="center _13px tb-body"><?php echo $data->rpt_dt1; ?></td>
		<td width="95" class="_13px tb-body"></td>
		<td width="95" class="_13px tb-body"></td>
		<td width="105" class="_13px tb-body"></td>
		</div>
	</tr>
	
	<tr class="border-tb">
	<div class="bg_td">
	<td width="293" class="_13px tb-body">Hours on Oil</td>
		<td width="95" class="center _13px tb-body"></td>
		<td width="95" class="center _13px tb-body"></td>
		<td width="95" class="_13px tb-body"></td>
		<td width="95" class="_13px tb-body"></td>
		<td width="105" class="_13px tb-body"></td>
		</div>
	</tr>
	
	<tr class="border-tb">
	<div class="bg_td">
	<td width="293" class="_13px tb-body">Oil Change</td>
		<td width="95" class="center _13px tb-body"><?php echo $data->oil_change; ?></td>
		<td width="95" class="center _13px tb-body"><?php echo $data->oil_change; ?></td>
		<td width="95" class="_13px tb-body"></td>
		<td width="95" class="_13px tb-body"></td>
		<td width="105" class="_13px tb-body"></td>
		</div>
	</tr>
	
</table>
<!-- <div style="height: 1px; background-color: #b8b894;"></div> -->
<table width="1000">
	<tr class="border-tb">
		<td height="20" width="100" class="th_bold  _14px">Physical Test</td>
		<td width="50" class="th_bold center  _14px">Unit</td>
		<td width="150" class="th_bold center  _14px">Method</td>
		<td width="100" class="th_bold  _14px"></td>
		<td width="100" class="th_bold  _14px"></td>
		<td width="100" class="th_bold center  _14px">Test Value</td>
		<td width="110" class="th_bold  _14px"></td>
		<td width="110" class="th_bold  _14px"></td>
		<td width="87" class="th_bold  _14px">Attention</td>
		<td width="87" class="th_bold  _14px">Urgent</td>
	</tr>

	<tr class="border-tb">
		<td height="20" width="100" class="_13px tb-body">Visc@40C (*)</td>
		<td width="50" class="center _13px tb-body">cSt</td>
		<td width="150" class="center _13px tb-body">ASTM D445-12</td>
		<td width="100" class="center _13px tb-body">B/13.01</td>
		<td width="100" class="center _13px tb-body">12.44</td>
		<td width="100" class="center tb-body"></td>
		<td width="110" class="center tb-body"></td>
		<td width="110" class="center tb-body"></td>
		<td height="20" width="87" class="center urgent"></td>
		<td height="20" width="87" class="center urgent"></td>
	</tr>
	<tr class="border-tb">
		<td height="20" width="100" class="_13px tb-body">Visc@100C (*)</td>
		<td width="50" class="center _13px tb-body">cSt</td>
		<td width="150" class="center _13px tb-body">ASTM D445-12</td>
		<td width="100" class="center _13px tb-body">B/13.01</td>
		<td width="100" class="center _13px tb-body">12.44</td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="87" class="center _13px urgent"></td>
		<td width="87" class="center _13px urgent"></td>
	</tr>
	<tr class="border-tb">
		<td height="20" width="100" class="_13px tb-body">TAN</td>
		<td width="50" class="center _13px tb-body">cSt</td>
		<td width="150" class="center _13px tb-body">ASTM D445-12</td>
		<td width="100" class="center _13px tb-body">B/13.01</td>
		<td width="100" class="center _13px tb-body">12.44</td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="87" class="center _13px urgent"></td>
		<td width="87" class="center _13px urgent"></td>
	</tr>
	<tr class="border-tb">
		<td height="20" width="100" class="_13px tb-body">TBN</td>
		<td width="50" class="center _13px tb-body">cSt</td>
		<td width="150" class="center _13px tb-body">ASTM D445-12</td>
		<td width="100" class="center _13px tb-body">B/13.01</td>
		<td width="100" class="center _13px tb-body">12.44</td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="87" class="center _13px urgent"></td>
		<td width="87" class="center _13px urgent"></td>
	</tr>
</table>

<!-- <div style="height: 1px; background-color: #b8b894;"></div> -->
<table width="1000">
	<tr class="border-tb">
		<td height="20" width="100" class="th_bold _14px">Metal Additive</td>
		<td width="50" class="th_bold center  _14px"></td>
		<td width="150" class="th_bold center  _14px"></td>
		<td width="100" class="th_bold  _14px"></td>
		<td width="100" class="th_bold  _14px"></td>
		<td width="100" class="th_bold center  _14px"></td>
		<td width="110" class="th_bold  _14px"></td>
		<td width="110" class="th_bold  _14px"></td>
		<td width="87" class="urgent  _14px">Warning</td>
		<td width="87" class="urgent  _14px">Limit</td>
	</tr>

	<tr class="border-tb">
		<td height="20" width="100" class="_13px tb-body">Magnesium (Mg)</td>
		<td width="50" class="center _13px tb-body">ppm</td>
		<td width="150" class="center _13px tb-body">ASTM D 5185-13e1</td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center tb-body"></td>
		<td width="110" class="center tb-body"></td>
		<td width="110" class="center tb-body"></td>
		<td height="20" width="87" class="center urgent"></td>
		<td height="20" width="87" class="center urgent"></td>
	</tr>
	<tr class="border-tb">
		<td height="20" width="100" class="_13px tb-body">Calcium (Ca)</td>
		<td width="50" class="center _13px tb-body">ppm</td>
		<td width="150" class="center _13px tb-body">ASTM D 5185-13e1</td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="87" class="center _13px urgent"></td>
		<td width="87" class="center _13px urgent"></td>
	</tr>
	<tr class="border-tb">
		<td height="20" width="100" class="_13px tb-body">Zinc (Zn)</td>
		<td width="50" class="center _13px tb-body">ppm</td>
		<td width="150" class="center _13px tb-body">ASTM D 5185-13e1</td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="87" class="center _13px urgent"></td>
		<td width="87" class="center _13px urgent"></td>
	</tr>
	<tr class="border-tb">
		<td height="20" width="100" class="_13px tb-body">Boron</td>
		<td width="50" class="center _13px tb-body">ppm</td>
		<td width="150" class="center _13px tb-body">ASTM D 5185-13e1</td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="87" class="center _13px urgent"></td>
		<td width="87" class="center _13px urgent"></td>
	</tr>
	<tr class="border-tb">
		<td height="20" width="100" class="_13px tb-body">Phosphor</td>
		<td width="50" class="center _13px tb-body">ppm</td>
		<td width="150" class="center _13px tb-body">ASTM D 5185-13e1</td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="87" class="center _13px urgent"></td>
		<td width="87" class="center _13px urgent"></td>
	</tr>
</table>

<!-- <div style="height: 1px; background-color: #b8b894;"></div> -->
<table width="1000">
	<tr class="border-tb">
		<td height="20" width="100" class="th_bold _14px">Contaminant</td>
		<td width="50" class="th_bold center  _14px"></td>
		<td width="150" class="th_bold center  _14px"></td>
		<td width="100" class="th_bold  _14px"></td>
		<td width="100" class="th_bold  _14px"></td>
		<td width="100" class="th_bold center  _14px"></td>
		<td width="110" class="th_bold  _14px"></td>
		<td width="110" class="th_bold  _14px"></td>
		<td width="87" class="urgent  _14px">Warning</td>
		<td width="87" class="urgent  _14px">Limit</td>
	</tr>

	<tr class="border-tb">
		<td height="20" width="100" class="_13px tb-body">Magnesium (Mg)</td>
		<td width="50" class="center _13px tb-body">ppm</td>
		<td width="150" class="center _13px tb-body">ASTM D 5185-13e1</td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center tb-body"></td>
		<td width="110" class="center tb-body"></td>
		<td width="110" class="center tb-body"></td>
		<td height="20" width="87" class="center urgent"></td>
		<td height="20" width="87" class="center urgent"></td>
	</tr>
	<tr class="border-tb">
		<td height="20" width="100" class="_13px tb-body">Calcium (Ca)</td>
		<td width="50" class="center _13px tb-body">ppm</td>
		<td width="150" class="center _13px tb-body">ASTM D 5185-13e1</td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="87" class="center _13px urgent"></td>
		<td width="87" class="center _13px urgent"></td>
	</tr>
	
</table>

<!-- <div style="height: 1px; background-color: #b8b894;"></div> -->
<table width="1000">
	<tr class="border-tb">
		<td height="20" width="100" class="th_bold _14px">Wear Metal</td>
		<td width="50" class="th_bold center  _14px"></td>
		<td width="150" class="th_bold center  _14px"></td>
		<td width="100" class="th_bold  _14px"></td>
		<td width="100" class="th_bold  _14px"></td>
		<td width="100" class="th_bold center  _14px"></td>
		<td width="110" class="th_bold  _14px"></td>
		<td width="110" class="th_bold  _14px"></td>
		<td width="87" class="urgent  _14px">Warning</td>
		<td width="87" class="urgent  _14px">Limit</td>
	</tr>

	<tr class="border-tb">
		<td height="20" width="100" class="_13px tb-body">Iron (Fe)</td>
		<td width="50" class="center _13px tb-body">ppm</td>
		<td width="150" class="center _13px tb-body">ASTM D 5185-13e1</td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center tb-body"></td>
		<td width="110" class="center tb-body"></td>
		<td width="110" class="center tb-body"></td>
		<td height="20" width="87" class="center urgent"></td>
		<td height="20" width="87" class="center urgent"></td>
	</tr>
	<tr class="border-tb">
		<td height="20" width="100" class="_13px tb-body">Copper (Cu)</td>
		<td width="50" class="center _13px tb-body">ppm</td>
		<td width="150" class="center _13px tb-body">ASTM D 5185-13e1</td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="87" class="center _13px urgent"></td>
		<td width="87" class="center _13px urgent"></td>
	</tr>
	<tr class="border-tb">
		<td height="20" width="100" class="_13px tb-body">Alumunium (Al)</td>
		<td width="50" class="center _13px tb-body">ppm</td>
		<td width="150" class="center _13px tb-body">ASTM D 5185-13e1</td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="87" class="center _13px urgent"></td>
		<td width="87" class="center _13px urgent"></td>
	</tr>
	<tr class="border-tb">
		<td height="20" width="100" class="_13px tb-body">Chromium (Cr)</td>
		<td width="50" class="center _13px tb-body">ppm</td>
		<td width="150" class="center _13px tb-body">ASTM D 5185-13e1</td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="87" class="center _13px urgent"></td>
		<td width="87" class="center _13px urgent"></td>
	</tr>
	<tr class="border-tb">
		<td height="20" width="100" class="_13px tb-body">Nickel (Ni)</td>
		<td width="50" class="center _13px tb-body">ppm</td>
		<td width="150" class="center _13px tb-body">ASTM D 5185-13e1</td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="87" class="center _13px urgent"></td>
		<td width="87" class="center _13px urgent"></td>
	</tr>
	<tr class="border-tb">
		<td height="20" width="100" class="_13px tb-body">Tin (Sn)</td>
		<td width="50" class="center _13px tb-body">ppm</td>
		<td width="150" class="center _13px tb-body">ASTM D 5185-13e1</td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="87" class="center _13px urgent"></td>
		<td width="87" class="center _13px urgent"></td>
	</tr>
	<tr class="border-tb">
		<td height="20" width="100" class="_13px tb-body">Lead (Pb)</td>
		<td width="50" class="center _13px tb-body">ppm</td>
		<td width="150" class="center _13px tb-body">ASTM D 5185-13e1</td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="87" class="center _13px urgent"></td>
		<td width="87" class="center _13px urgent"></td>
	</tr>
	<tr class="border-tb">
		<td height="20" width="100" class="_13px tb-body">PQ Index</td>
		<td width="50" class="center _13px tb-body">ppm</td>
		<td width="150" class="center _13px tb-body">ASTM D 5185-13e1</td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="87" class="center _13px urgent"></td>
		<td width="87" class="center _13px urgent"></td>
	</tr>
	<tr class="border-tb">
		<td height="20" width="100" class="_13px tb-body">Color</td>
		<td width="50" class="center _13px tb-body">ppm</td>
		<td width="150" class="center _13px tb-body">ASTM D 5185-13e1</td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="87" class="center _13px urgent"></td>
		<td width="87" class="center _13px urgent"></td>
	</tr>
</table>

<!-- <div style="height: 1px; background-color: #b8b894;"></div> -->
<table width="1000">
	<tr class="border-tb">
		<td height="20" width="100" class="th_bold _14px">FTIR</td>
		<td width="50" class="th_bold center  _14px"></td>
		<td width="150" class="th_bold center  _14px"></td>
		<td width="100" class="th_bold  _14px"></td>
		<td width="100" class="th_bold  _14px"></td>
		<td width="100" class="th_bold center  _14px"></td>
		<td width="110" class="th_bold  _14px"></td>
		<td width="110" class="th_bold  _14px"></td>
		<td width="87" class="urgent  _14px">Warning</td>
		<td width="87" class="urgent  _14px">Limit</td>
	</tr>

	<tr class="border-tb">
		<td height="20" width="100" class="_13px tb-body">Iron (Fe)</td>
		<td width="50" class="center _13px tb-body">ppm</td>
		<td width="150" class="center _13px tb-body">ASTM D 5185-13e1</td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center tb-body"></td>
		<td width="110" class="center tb-body"></td>
		<td width="110" class="center tb-body"></td>
		<td height="20" width="87" class="center urgent"></td>
		<td height="20" width="87" class="center urgent"></td>
	</tr>
	<tr class="border-tb">
		<td height="20" width="100" class="_13px tb-body">Copper (Cu)</td>
		<td width="50" class="center _13px tb-body">ppm</td>
		<td width="150" class="center _13px tb-body">ASTM D 5185-13e1</td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="87" class="center _13px urgent"></td>
		<td width="87" class="center _13px urgent"></td>
	</tr>
	<tr class="border-tb">
		<td height="20" width="100" class="_13px tb-body">Alumunium (Al)</td>
		<td width="50" class="center _13px tb-body">ppm</td>
		<td width="150" class="center _13px tb-body">ASTM D 5185-13e1</td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="87" class="center _13px urgent"></td>
		<td width="87" class="center _13px urgent"></td>
	</tr>
	<tr class="border-tb">
		<td height="20" width="100" class="_13px tb-body">Chromium (Cr)</td>
		<td width="50" class="center _13px tb-body">ppm</td>
		<td width="150" class="center _13px tb-body">ASTM D 5185-13e1</td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="87" class="center _13px urgent"></td>
		<td width="87" class="center _13px urgent"></td>
	</tr>
	<tr class="border-tb">
		<td height="20" width="100" class="_13px tb-body">Nickel (Ni)</td>
		<td width="50" class="center _13px tb-body">ppm</td>
		<td width="150" class="center _13px tb-body">ASTM D 5185-13e1</td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="87" class="center _13px urgent"></td>
		<td width="87" class="center _13px urgent"></td>
	</tr>
	<tr class="border-tb">
		<td height="20" width="100" class="_13px tb-body">Tin (Sn)</td>
		<td width="50" class="center _13px tb-body">ppm</td>
		<td width="150" class="center _13px tb-body">ASTM D 5185-13e1</td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="87" class="center _13px urgent"></td>
		<td width="87" class="center _13px urgent"></td>
	</tr>
	<tr class="border-tb">
		<td height="20" width="100" class="_13px tb-body">Lead (Pb)</td>
		<td width="50" class="center _13px tb-body">ppm</td>
		<td width="150" class="center _13px tb-body">ASTM D 5185-13e1</td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="87" class="center _13px urgent"></td>
		<td width="87" class="center _13px urgent"></td>
	</tr>
</table>

<!-- <div style="height: 1px; background-color: #b8b894;"></div> -->
<table width="1000">
	<tr class="border-tb">
		<td height="20" width="100" class="th_bold _14px">Cleanliness</td>
		<td width="50" class="th_bold center  _14px"></td>
		<td width="150" class="th_bold center  _14px"></td>
		<td width="100" class="th_bold  _14px"></td>
		<td width="100" class="th_bold  _14px"></td>
		<td width="100" class="th_bold center  _14px"></td>
		<td width="110" class="th_bold  _14px"></td>
		<td width="110" class="th_bold  _14px"></td>
		<td width="87" class="urgent  _14px">Warning</td>
		<td width="87" class="urgent  _14px">Limit</td>
	</tr>

	<tr class="border-tb">
		<td height="20" width="100" class="_13px tb-body">Iron (Fe)</td>
		<td width="50" class="center _13px tb-body">ppm</td>
		<td width="150" class="center _13px tb-body">ASTM D 5185-13e1</td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center tb-body"></td>
		<td width="110" class="center tb-body"></td>
		<td width="110" class="center tb-body"></td>
		<td height="20" width="87" class="center urgent"></td>
		<td height="20" width="87" class="center urgent"></td>
	</tr>
	<tr class="border-tb">
		<td height="20" width="100" class="_13px tb-body">Copper (Cu)</td>
		<td width="50" class="center _13px tb-body">ppm</td>
		<td width="150" class="center _13px tb-body">ASTM D 5185-13e1</td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="87" class="center _13px urgent"></td>
		<td width="87" class="center _13px urgent"></td>
	</tr>
	<tr class="border-tb">
		<td height="20" width="100" class="_13px tb-body">Alumunium (Al)</td>
		<td width="50" class="center _13px tb-body">ppm</td>
		<td width="150" class="center _13px tb-body">ASTM D 5185-13e1</td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="87" class="center _13px urgent"></td>
		<td width="87" class="center _13px urgent"></td>
	</tr>
	<tr class="border-tb">
		<td height="20" width="100" class="_13px tb-body">Chromium (Cr)</td>
		<td width="50" class="center _13px tb-body">ppm</td>
		<td width="150" class="center _13px tb-body">ASTM D 5185-13e1</td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="110" class="center _13px tb-body"></td>
		<td width="87" class="center _13px urgent"></td>
		<td width="87" class="center _13px urgent"></td>
	</tr>
</table>

<!-- <div style="height: 1px; background-color: #b8b894;"></div> -->
<table width="1000">
	<tr class="border-tb">
		<td height="20" width="100" class="th_bold _14px">OTHERS</td>
		<td width="50" class="th_bold center  _14px"></td>
		<td width="150" class="th_bold center  _14px"></td>
		<td width="100" class="th_bold  _14px"></td>
		<td width="100" class="th_bold  _14px"></td>
		<td width="100" class="th_bold center  _14px"></td>
		<td width="110" class="th_bold  _14px"></td>
		<td width="110" class="th_bold  _14px"></td>
		<td width="87" class="urgent  _14px"></td>
		<td width="87" class="urgent  _14px"></td>
	</tr>
</table>

<!-- <table>
	<tr>
		<td width="450">
			<div id="chart1">
<div class="c-label"><b>WEAR TRENDING</b></div>
<div id="lineChart"></div>
</div>
		</td>
<td width="20">-</td>
		<td width="450">
			<div id="chart2">
<div class="c-label"><b>WEAR TRENDING</b></div>
<div id="lineChart2"></div>
</div>
		</td>
	</tr>
</table> -->


<div style="margin-top: 20px;"></div>
<div style="height: 1.4px; background-color: black;"></div>
<table>
	<tr class="urgent">
		<td width="500">
			<b><u>Source of Abnormality</u></b>
		</td>
		<td width="500">
			<b><u>Action to be taken</u></b>
		</td>
	</tr>
	<tr class="tb-body">
		<td>
			<p class="justify">Kadar air sangat tinggi, kemungkinan berasal dari kontaminasi lingkungan kerja atau kondensasi.</p>
		</td>
		<td>
			<p class="justify">Periksa sumber masuknya kadar air ke sistem pelumasan. Cek kemungkinan kerusakan pada seal, gasket, oil filler plug atau retak housing. Disarankan lakukan penggantian
pelumas. Bilas sistem pelumasan. Resampling 250 jam berikutnya untuk monitoring.</p>
		</td>
	</tr>
	<tr>
		<td>
		<p>&nbsp;</p>
			<b><u>Manager Teknis</u></b>
		</td>
	</tr>
	<tr>
		<td>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
			<b><u>Ahmad subardjo</u></b>
		</td>
	</tr>
</table>

<?php /*echo \yii2mod\c3\chart\Chart::widget([
    'options' => [
            'id' => 'popularity_chart'
    ],
    'clientOptions' => [
       'data' => [
            'x' => 'x',
            'columns' => [
                ['x', 'week 1', 'week 2', 'week 3', 'week 4'],
                ['Popularity', 10, 20, 30, 50]
            ],
            'colors' => [
                'Popularity' => '#4EB269',
            ],
        ],
        'axis' => [
            'x' => [
                'label' => 'Month',
                'type' => 'category'
            ],
            'y' => [
                'label' => [
                    'text' => 'Popularity',
                    'position' => 'outer-top'
                ],
                'min' => 0,
                'max' => 100,
                'padding' => ['top' => 10, 'bottom' => 0]
            ]
        ]
    ]
]);*/ ?>

</div><!--wrap-->
<?php $this->endBody() ?> 
</body>
</html>

<?php JSRegister::begin(); ?>
<script>

 /*c3.generate({
                bindto: '#lineChart',
                data:{
                    columns: [
                        ['data1', 30, 200, 100, 400, 150, 250],
                        ['data2', 50, 20, 10, 40, 15, 25]
                    ],
                    colors:{
                        data1: '#1ab394',
                        data2: '#BABABA'
                    }
                }
            });

  c3.generate({
                bindto: '#lineChart2',
                data:{
                    columns: [
                        ['data1', 30, 200, 100, 400, 150, 250],
                        ['data2', 50, 20, 10, 40, 15, 25]
                    ],
                    colors:{
                        data1: '#1ab394',
                        data2: '#BABABA'
                    }
                }
            });*/

</script>
<?php JSRegister::end(); ?>

<?php $this->endPage() ?>
