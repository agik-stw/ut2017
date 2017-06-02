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
<div id="header">
<table class="">
	<tr>
		<td width="600" style="vertical-align: top;">
			<img width="360" src="<?php echo Url::base('').'/'.'img/logo2.png';?>">
		</td>
		<td width="400" id="tdRight" align="right" style="vertical-align: top;">
		<div id="HeaderRight" style="height: 30px; border-radius: 15px; width: 400px; ">
			<b style="color: black; font-size: 22px;">FUEL ANALYSIS REPORT</b><br>
			<b>Balikpapan, 26 January 2016</b>
			</div>
			<!-- <p align="center">Balikpapan, 26 January 2016</p> -->
		</td>
		 
	</tr>
</table>
</div>

<div style="height: 1.4px; background-color: black;"></div>

<table>
			<tr>
				<td width="200" class="_14px">Customer Name</td>
				<td>:</td>
				<td width="450" align="left" class="_14px">PT. PAMAPERSADA NUSANTARA</td>
				<td align="center" style="font-size: 20px; background-color: #d6d6c2;" width="350">Overall Analysis Result</td>
			</tr>
			<tr>
				<td width="200" class="_14px">Address</td>
				<td>:</td>
				<td width="450" class="_14px">Jl. Rawagelam I No.9 Kawasan Industri Pulogadung Jakarta-13930</td>
				<td rowspan="4" align="right" width="350">
				<b style="font-size: 30px; padding-bottom: 100px; color: red;">URGENT</b>
&nbsp;
					<img id="logominyak" width="45" src="<?php echo Url::base('').'/'.'img/logominyak.png';?>">
				</td>
			</tr>
			<tr>
				<td width="200" class="_14px">Telp / Fax</td>
				<td>:</td>
				<td width="450" align="left" class="_14px">021-4602015 / 021-4601916</td>
			</tr>
			<tr>
				<td width="200" class="_14px">For Customer</td>
				<td>:</td>
				<td width="450" align="left" class="_14px">PAMA TUTUPAN - ADARO</td>
			</tr>
			<tr>
				<td width="200" class="_14px">Sample Type</td>
				<td>:</td>
				<td width="450" align="left" class="_14px">FUEL</td>
			</tr>
			<tr>
				<td width="200" class="_14px">Lab Number</td>
				<td>:</td>
				<td width="450" align="left" class="_14px">FB1600001</td>
				<td class="_14px">Sampling Point</td>
			</tr>
			<tr>
				<td width="200" class="_14px">Sampling Date</td>
				<td>:</td>
				<td width="450" align="left" class="_14px">16 January 2016</td>
				<td class="_14px">Sampling Location</td>
			</tr>
			<tr>
				<td width="200" class="_14px">Sample Received Date</td>
				<td>:</td>
				<td width="450" align="left" class="_14px">18 January 2016</td>
				<td class="_14px">Fuel Matrix</td>
			</tr>
			<tr>
				<td width="200" class="_14px">Report Date</td>
				<td>:</td>
				<td width="450" align="left" class="_14px">18 January 2016</td>
			</tr>
		</table>

<div style="height: 1.7px; background-color: black;"></div>

<!-- <div style="height: 1px; background-color: #b8b894;"></div> -->
<table width="1000">
	<tr class="border-tb">
		<td width="20" class="th_bold _14px center">No</td>
		<td width="200" class="th_bold center  _14px">Parameter</td>
		<td width="100" class="th_bold center  _14px">Unit</td>
		<td width="250" class="th_bold center _14px">Method</td>
		<td width="200" class="th_bold center _14px">Result</td>
		<td width="100" class="th_bold center  _14px">Limit Min</td>
		<td width="100" class="th_bold center _14px">Limit Max</td>
	</tr>

	<tr class="border-tb">
		<td width="20" class="_13px tb-body center">1</td>
		<td width="200" class="left _13px tb-body">Appearance</td>
		<td width="100" class="center _13px tb-body"></td>
		<td width="250" class="center _13px tb-body">VISUAL (MU/5.4/01/04-APP)</td>
		<td width="200" class="center _13px tb-body">Clear</td>
		<td width="100" class="center tb-body"></td>
		<td width="100" class="center tb-body"></td>
	</tr>
	<tr class="border-tb">
<td width="20" class="_13px tb-body center">2</td>
		<td width="200" class="left _13px tb-body">Density 15°C</td>
		<td width="100" class="center _13px tb-body">kg/m3</td>
		<td width="250" class="center _13px tb-body">ASTM D	1298-12b</td>
		<td width="200" class="center _13px tb-body">850.6 / C</td>
		<td width="100" class="center tb-body"></td>
		<td width="100" class="center tb-body"></td>
	</tr>
	<tr class="border-tb">
<td width="20" class="_13px tb-body center">3</td>
		<td width="200" class="left _13px tb-body">Total Acid Number (TAN)</td>
		<td width="100" class="center _13px tb-body">kg/m3</td>
		<td width="250" class="center _13px tb-body">ASTM D	1298-12b</td>
		<td width="200" class="center _13px tb-body">850.6 / C</td>
		<td width="100" class="center tb-body"></td>
		<td width="100" class="center tb-body"></td>
	</tr>
	<tr class="border-tb">
<td width="20" class="_13px tb-body center">4</td>
		<td width="200" class="left _13px tb-body">Flash Point  PMCC </td>
		<td width="100" class="center _13px tb-body">kg/m3</td>
		<td width="250" class="center _13px tb-body">ASTM D	1298-12b</td>
		<td width="200" class="center _13px tb-body">850.6 / C</td>
		<td width="100" class="center tb-body"></td>
		<td width="100" class="center tb-body"></td>
	</tr>
		<tr class="border-tb">
<td width="20" class="_13px tb-body center">5</td>
		<td width="200" class="left _13px tb-body">Viscosity Kin. @ 40 °C</td>
		<td width="100" class="center _13px tb-body">kg/m3</td>
		<td width="250" class="center _13px tb-body">ASTM D	1298-12b</td>
		<td width="200" class="center _13px tb-body">850.6 / C</td>
		<td width="100" class="center tb-body"></td>
		<td width="100" class="center tb-body"></td>
	</tr>
			<tr class="border-tb">
<td width="20" class="_13px tb-body center">6</td>
		<td width="200" class="left _13px tb-body">Water Content by Distillation</td>
		<td width="100" class="center _13px tb-body">kg/m3</td>
		<td width="250" class="center _13px tb-body">ASTM D	1298-12b</td>
		<td width="200" class="center _13px tb-body">850.6 / C</td>
		<td width="100" class="center tb-body"></td>
		<td width="100" class="center tb-body"></td>
	</tr>
	<tr>
	<td width="20" class="_13px tb-body center">7</td>
		<td width="200" class="left _13px tb-body">Ash Content</td>
		<td width="100" class="center _13px tb-body">kg/m3</td>
		<td width="250" class="center _13px tb-body">ASTM D	1298-12b</td>
		<td width="200" class="center _13px tb-body">850.6 / C</td>
		<td width="100" class="center tb-body"></td>
		<td width="100" class="center tb-body"></td>
	</tr>
	<tr>
	<td width="20" class="_13px tb-body center">8</td>
		<td width="200" class="left _13px tb-body">Pour Point</td>
		<td width="100" class="center _13px tb-body">kg/m3</td>
		<td width="250" class="center _13px tb-body">ASTM D	1298-12b</td>
		<td width="200" class="center _13px tb-body">850.6 / C</td>
		<td width="100" class="center tb-body"></td>
		<td width="100" class="center tb-body"></td>
	</tr>
	<tr>
	<td width="20" class="_13px tb-body center">9</td>
		<td width="200" class="left _13px tb-body">Cetane Index</td>
		<td width="100" class="center _13px tb-body">kg/m3</td>
		<td width="250" class="center _13px tb-body">ASTM D	1298-12b</td>
		<td width="200" class="center _13px tb-body">850.6 / C</td>
		<td width="100" class="center tb-body"></td>
		<td width="100" class="center tb-body"></td>
	</tr>
		<tr>
	<td width="20" class="_13px tb-body center">10</td>
		<td width="200" class="left _13px tb-body">Conradson Carbon Residue On 10% Distillate Residue</td>
		<td width="100" class="center _13px tb-body">kg/m3</td>
		<td width="250" class="center _13px tb-body">ASTM D	1298-12b</td>
		<td width="200" class="center _13px tb-body">850.6 / C</td>
		<td width="100" class="center tb-body"></td>
		<td width="100" class="center tb-body"></td>
	</tr>
	<tr>
	<td width="20" class="_13px tb-body center">11</td>
		<td width="200" class="left _13px tb-body">Distillation Recovery Basis :</td>
		<td width="100" class="center _13px tb-body">kg/m3</td>
		<td width="250" class="center _13px tb-body">ASTM D	1298-12b</td>
		<td width="200" class="center _13px tb-body">850.6 / C</td>
		<td width="100" class="center tb-body"></td>
		<td width="100" class="center tb-body"></td>
	</tr>
	<tr>
	<td width="20" class="_13px tb-body center"></td>
		<td width="200" class="left _13px tb-body sub">IBP</td>
		<td width="100" class="center _13px tb-body">kg/m3</td>
		<td width="250" class="center _13px tb-body">ASTM D	1298-12b</td>
		<td width="200" class="center _13px tb-body">850.6 / C</td>
		<td width="100" class="center tb-body"></td>
		<td width="100" class="center tb-body"></td>
	</tr>

	<tr>
	<td width="20" class="_13px tb-body center"></td>
		<td width="200" class="left _13px tb-body sub">IBP</td>
		<td width="100" class="center _13px tb-body">kg/m3</td>
		<td width="250" class="center _13px tb-body">ASTM D	1298-12b</td>
		<td width="200" class="center _13px tb-body">850.6 / C</td>
		<td width="100" class="center tb-body"></td>
		<td width="100" class="center tb-body"></td>
	</tr>
<tr>
	<td width="20" class="_13px tb-body center"></td>
		<td width="200" class="left _13px tb-body sub">IBP</td>
		<td width="100" class="center _13px tb-body">kg/m3</td>
		<td width="250" class="center _13px tb-body">ASTM D	1298-12b</td>
		<td width="200" class="center _13px tb-body">850.6 / C</td>
		<td width="100" class="center tb-body"></td>
		<td width="100" class="center tb-body"></td>
	</tr>
<tr>
	<td width="20" class="_13px tb-body center"></td>
		<td width="200" class="left _13px tb-body sub">IBP</td>
		<td width="100" class="center _13px tb-body">kg/m3</td>
		<td width="250" class="center _13px tb-body">ASTM D	1298-12b</td>
		<td width="200" class="center _13px tb-body">850.6 / C</td>
		<td width="100" class="center tb-body"></td>
		<td width="100" class="center tb-body"></td>
	</tr>
<tr>
	<td width="20" class="_13px tb-body center"></td>
		<td width="200" class="left _13px tb-body sub">IBP</td>
		<td width="100" class="center _13px tb-body">kg/m3</td>
		<td width="250" class="center _13px tb-body">ASTM D	1298-12b</td>
		<td width="200" class="center _13px tb-body">850.6 / C</td>
		<td width="100" class="center tb-body"></td>
		<td width="100" class="center tb-body"></td>
	</tr>
<tr>
	<td width="20" class="_13px tb-body center"></td>
		<td width="200" class="left _13px tb-body sub">IBP</td>
		<td width="100" class="center _13px tb-body">kg/m3</td>
		<td width="250" class="center _13px tb-body">ASTM D	1298-12b</td>
		<td width="200" class="center _13px tb-body">850.6 / C</td>
		<td width="100" class="center tb-body"></td>
		<td width="100" class="center tb-body"></td>
	</tr>
<tr>
	<td width="20" class="_13px tb-body center"></td>
		<td width="200" class="left _13px tb-body sub">IBP</td>
		<td width="100" class="center _13px tb-body">kg/m3</td>
		<td width="250" class="center _13px tb-body">ASTM D	1298-12b</td>
		<td width="200" class="center _13px tb-body">850.6 / C</td>
		<td width="100" class="center tb-body"></td>
		<td width="100" class="center tb-body"></td>
	</tr>
<tr>
	<td width="20" class="_13px tb-body center"></td>
		<td width="200" class="left _13px tb-body sub">IBP</td>
		<td width="100" class="center _13px tb-body">kg/m3</td>
		<td width="250" class="center _13px tb-body">ASTM D	1298-12b</td>
		<td width="200" class="center _13px tb-body">850.6 / C</td>
		<td width="100" class="center tb-body"></td>
		<td width="100" class="center tb-body"></td>
	</tr>
<tr>
	<td width="20" class="_13px tb-body center"></td>
		<td width="200" class="left _13px tb-body sub">IBP</td>
		<td width="100" class="center _13px tb-body">kg/m3</td>
		<td width="250" class="center _13px tb-body">ASTM D	1298-12b</td>
		<td width="200" class="center _13px tb-body">850.6 / C</td>
		<td width="100" class="center tb-body"></td>
		<td width="100" class="center tb-body"></td>
	</tr>
<tr>
	<td width="20" class="_13px tb-body center"></td>
		<td width="200" class="left _13px tb-body sub">IBP</td>
		<td width="100" class="center _13px tb-body">kg/m3</td>
		<td width="250" class="center _13px tb-body">ASTM D	1298-12b</td>
		<td width="200" class="center _13px tb-body">850.6 / C</td>
		<td width="100" class="center tb-body"></td>
		<td width="100" class="center tb-body"></td>
	</tr>
<tr>
	<td width="20" class="_13px tb-body center"></td>
		<td width="200" class="left _13px tb-body sub">IBP</td>
		<td width="100" class="center _13px tb-body">kg/m3</td>
		<td width="250" class="center _13px tb-body">ASTM D	1298-12b</td>
		<td width="200" class="center _13px tb-body">850.6 / C</td>
		<td width="100" class="center tb-body"></td>
		<td width="100" class="center tb-body"></td>
	</tr>
<tr>
	<td width="20" class="_13px tb-body center"></td>
		<td width="200" class="left _13px tb-body sub">IBP</td>
		<td width="100" class="center _13px tb-body">kg/m3</td>
		<td width="250" class="center _13px tb-body">ASTM D	1298-12b</td>
		<td width="200" class="center _13px tb-body">850.6 / C</td>
		<td width="100" class="center tb-body"></td>
		<td width="100" class="center tb-body"></td>
	</tr>
<tr>
	<td width="20" class="_13px tb-body center"></td>
		<td width="200" class="left _13px tb-body sub">IBP</td>
		<td width="100" class="center _13px tb-body">kg/m3</td>
		<td width="250" class="center _13px tb-body">ASTM D	1298-12b</td>
		<td width="200" class="center _13px tb-body">850.6 / C</td>
		<td width="100" class="center tb-body"></td>
		<td width="100" class="center tb-body"></td>
	</tr>
<tr>
	<td width="20" class="_13px tb-body center"></td>
		<td width="200" class="left _13px tb-body sub">IBP</td>
		<td width="100" class="center _13px tb-body">kg/m3</td>
		<td width="250" class="center _13px tb-body">ASTM D	1298-12b</td>
		<td width="200" class="center _13px tb-body">850.6 / C</td>
		<td width="100" class="center tb-body"></td>
		<td width="100" class="center tb-body"></td>
	</tr>
<tr>
	<td width="20" class="_13px tb-body center"></td>
		<td width="200" class="left _13px tb-body sub">IBP</td>
		<td width="100" class="center _13px tb-body">kg/m3</td>
		<td width="250" class="center _13px tb-body">ASTM D	1298-12b</td>
		<td width="200" class="center _13px tb-body">850.6 / C</td>
		<td width="100" class="center tb-body"></td>
		<td width="100" class="center tb-body"></td>
	</tr>
<tr>
	<td width="20" class="_13px tb-body center"></td>
		<td width="200" class="left _13px tb-body sub">IBP</td>
		<td width="100" class="center _13px tb-body">kg/m3</td>
		<td width="250" class="center _13px tb-body">ASTM D	1298-12b</td>
		<td width="200" class="center _13px tb-body">850.6 / C</td>
		<td width="100" class="center tb-body"></td>
		<td width="100" class="center tb-body"></td>
	</tr>
<tr>
	<td width="20" class="_13px tb-body center"></td>
		<td width="200" class="left _13px tb-body sub">IBP</td>
		<td width="100" class="center _13px tb-body">kg/m3</td>
		<td width="250" class="center _13px tb-body">ASTM D	1298-12b</td>
		<td width="200" class="center _13px tb-body">850.6 / C</td>
		<td width="100" class="center tb-body"></td>
		<td width="100" class="center tb-body"></td>
	</tr>
<tr>
	<td width="20" class="_13px tb-body center"></td>
		<td width="200" class="left _13px tb-body sub">IBP</td>
		<td width="100" class="center _13px tb-body">kg/m3</td>
		<td width="250" class="center _13px tb-body">ASTM D	1298-12b</td>
		<td width="200" class="center _13px tb-body">850.6 / C</td>
		<td width="100" class="center tb-body"></td>
		<td width="100" class="center tb-body"></td>
	</tr>
	<tr>
	<td width="20" class="_13px tb-body center">12</td>
		<td width="200" class="left _13px tb-body">Sulphur Content</td>
		<td width="100" class="center _13px tb-body">kg/m3</td>
		<td width="250" class="center _13px tb-body">ASTM D	1298-12b</td>
		<td width="200" class="center _13px tb-body">850.6 / C</td>
		<td width="100" class="center tb-body"></td>
		<td width="100" class="center tb-body"></td>
	</tr>
	<tr>
	<td width="20" class="_13px tb-body center">13</td>
		<td width="200" class="left _13px tb-body">Sediment</td>
		<td width="100" class="center _13px tb-body">kg/m3</td>
		<td width="250" class="center _13px tb-body">ASTM D	1298-12b</td>
		<td width="200" class="center _13px tb-body">850.6 / C</td>
		<td width="100" class="center tb-body"></td>
		<td width="100" class="center tb-body"></td>
	</tr>
		<tr>
	<td width="20" class="_13px tb-body center">14</td>
		<td width="200" class="left _13px tb-body">Colour ASTM</td>
		<td width="100" class="center _13px tb-body">kg/m3</td>
		<td width="250" class="center _13px tb-body">ASTM D	1298-12b</td>
		<td width="200" class="center _13px tb-body">850.6 / C</td>
		<td width="100" class="center tb-body"></td>
		<td width="100" class="center tb-body"></td>
	</tr>
	<tr>
	<td width="20" class="_13px tb-body center">15</td>
		<td width="200" class="left _13px tb-body">Copper Strip Corrosion at 50ºC/3Hrs</td>
		<td width="100" class="center _13px tb-body">kg/m3</td>
		<td width="250" class="center _13px tb-body">ASTM D	1298-12b</td>
		<td width="200" class="center _13px tb-body">850.6 / C</td>
		<td width="100" class="center tb-body"></td>
		<td width="100" class="center tb-body"></td>
	</tr>
	<tr>
	<td width="20" class="_13px tb-body center">16</td>
		<td width="200" class="left _13px tb-body">Oxidation Stability (Rancimat)</td>
		<td width="100" class="center _13px tb-body">kg/m3</td>
		<td width="250" class="center _13px tb-body">ASTM D	1298-12b</td>
		<td width="200" class="center _13px tb-body">850.6 / C</td>
		<td width="100" class="center tb-body"></td>
		<td width="100" class="center tb-body"></td>
	</tr>
	<tr>
	<td width="20" class="_13px tb-body center">17</td>
		<td width="200" class="left _13px tb-body">Lubricity of Diesel Fuel by HFRR Test</td>
		<td width="100" class="center _13px tb-body">kg/m3</td>
		<td width="250" class="center _13px tb-body">ASTM D	1298-12b</td>
		<td width="200" class="center _13px tb-body">850.6 / C</td>
		<td width="100" class="center tb-body"></td>
		<td width="100" class="center tb-body"></td>
	</tr>
	<tr>
	<td width="20" class="_13px tb-body center">18</td>
		<td width="200" class="left _13px tb-body">FAME Content</td>
		<td width="100" class="center _13px tb-body">kg/m3</td>
		<td width="250" class="center _13px tb-body">ASTM D	1298-12b</td>
		<td width="200" class="center _13px tb-body">850.6 / C</td>
		<td width="100" class="center tb-body"></td>
		<td width="100" class="center tb-body"></td>
	</tr>
	<tr>
	<td width="20" class="_13px tb-body center">19</td>
		<td width="200" class="left _13px tb-body">Solid Particles (Particle Size)</td>
		<td width="100" class="center _13px tb-body">kg/m3</td>
		<td width="250" class="center _13px tb-body">ASTM D	1298-12b</td>
		<td width="200" class="center _13px tb-body">850.6 / C</td>
		<td width="100" class="center tb-body"></td>
		<td width="100" class="center tb-body"></td>
	</tr>
	<tr>
	<td width="20" class="_13px tb-body center"></td>
		<td width="200" class="left _13px tb-body sub">IBP</td>
		<td width="100" class="center _13px tb-body">kg/m3</td>
		<td width="250" class="center _13px tb-body">ASTM D	1298-12b</td>
		<td width="200" class="center _13px tb-body">850.6 / C</td>
		<td width="100" class="center tb-body"></td>
		<td width="100" class="center tb-body"></td>
	</tr>
	<tr>
	<td width="20" class="_13px tb-body center"></td>
		<td width="200" class="left _13px tb-body sub">IBP</td>
		<td width="100" class="center _13px tb-body">kg/m3</td>
		<td width="250" class="center _13px tb-body">ASTM D	1298-12b</td>
		<td width="200" class="center _13px tb-body">850.6 / C</td>
		<td width="100" class="center tb-body"></td>
		<td width="100" class="center tb-body"></td>
	</tr>
	<tr>
	<td width="20" class="_13px tb-body center"></td>
		<td width="200" class="left _13px tb-body sub">IBP</td>
		<td width="100" class="center _13px tb-body">kg/m3</td>
		<td width="250" class="center _13px tb-body">ASTM D	1298-12b</td>
		<td width="200" class="center _13px tb-body">850.6 / C</td>
		<td width="100" class="center tb-body"></td>
		<td width="100" class="center tb-body"></td>
	</tr>
	<tr>
	<td width="20" class="_13px tb-body center"></td>
		<td width="200" class="left _13px tb-body sub">IBP</td>
		<td width="100" class="center _13px tb-body">kg/m3</td>
		<td width="250" class="center _13px tb-body">ASTM D	1298-12b</td>
		<td width="200" class="center _13px tb-body">850.6 / C</td>
		<td width="100" class="center tb-body"></td>
		<td width="100" class="center tb-body"></td>
	</tr>


</table>


<div style="margin-top: 20px;"></div>
<div style="height: 1.4px; background-color: black;"></div>
<table>
	<tr class="urgent">
		<td width="1000">
			<b><u class="_14px">Comment and Remark</u></b>
		</td>
	</tr>
	<tr class="" style="height: 70px;">
		<td valign="top" style="border: transparent">
			<b class="justify _13px">Berdasarkan hasil dari parameter yang diuji, tingkat kebersihan minyak solar tidak sesuai dengan nilai typical. Disarankan untuk melakukan filterisasi.</b>
		</td>
	</tr>
</table>

<table width="1000">
	<tr class="">
		<td width="700">
			<b><u class="_14px">Node:</u></b>
		</td>
		<td width="300" align="right">
			<b><u class="_14px">Manager Teknis</u></b>
		</td>
	</tr>
	<tr>
		<td class="" valign="top">
			<b class="justify _13px">Kadar air sangat tinggi, kemungkinan berasal dari kontaminasi lingkungan kerja atau kondensasi.</b>
		</td>
		<td align="right" valign="bottom">
		<br><br><br><br><br>
			<b><u class="_14px">Asbari, SSi</u></b>
		</td>
	</tr>
</table>


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
