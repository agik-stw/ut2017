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

<div class="underHeadLine" style="height: 3px;
	background-color: #000000;
	clear: both;"></div>



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
