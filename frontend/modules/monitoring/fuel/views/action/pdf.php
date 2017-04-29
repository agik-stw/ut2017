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
use frontend\assets\PdfAsset;
PdfAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
	
	<?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div id="wb_Image1" style="position:absolute;left:9px;top:53px;width:354px;height:53px;z-index:0;">
<img src="<?php echo Url::base('').'/'.'report/images/logo2.png';?>" id="Image1" alt=""></div>
<div id="wb_Image2" style="position:absolute;left:910px;top:8px;width:73px;height:52px;z-index:1;">
<img src="<?php echo Url::base('').'/'.'report/images/kan.jpg';?>" id="Image2" alt=""></div>
<div id="wb_Image3" style="position:absolute;left:837px;top:8px;width:73px;height:52px;z-index:2;">
<img src="<?php echo Url::base('').'/'.'report/images/kan.jpg';?>" id="Image3" alt=""></div>
<div id="wb_Shape1" style="position:absolute;left:9px;top:110px;width:971px;height:4px;z-index:3;">
<img src="<?php echo Url::base('').'/'.'report/images/img0002.png';?>" id="Shape1" alt="" style="width:971px;height:4px;"></div>
<div id="wb_Shape2" style="position:absolute;left:9px;top:198px;width:971px;height:4px;z-index:4;">
<img src="<?php echo Url::base('').'/'.'report/images/img0003.png';?>" id="Shape2" alt="" style="width:971px;height:4px;"></div>
<div id="wb_Text1" style="position:absolute;left:9px;top:122px;width:131px;height:16px;z-index:5;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Customer Name</span></div>
<div id="wb_Text2" style="position:absolute;left:9px;top:136px;width:131px;height:16px;z-index:6;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">For Attention</span></div>
<div id="wb_Text3" style="position:absolute;left:9px;top:151px;width:131px;height:16px;z-index:7;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Address</span></div>
<div id="wb_Text4" style="position:absolute;left:9px;top:165px;width:131px;height:16px;z-index:8;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Unit Model</span></div>
<div id="wb_Text5" style="position:absolute;left:9px;top:180px;width:131px;height:16px;z-index:9;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Unit Number</span></div>
<div id="wb_Text6" style="position:absolute;left:155px;top:122px;width:14px;height:16px;z-index:10;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">:</span></div>
<div id="wb_Text7" style="position:absolute;left:155px;top:136px;width:14px;height:16px;z-index:11;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">:</span></div>
<div id="wb_Text8" style="position:absolute;left:155px;top:152px;width:14px;height:16px;z-index:12;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">:</span></div>
<div id="wb_Text9" style="position:absolute;left:155px;top:165px;width:14px;height:16px;z-index:13;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">:</span></div>
<div id="wb_Text10" style="position:absolute;left:155px;top:179px;width:14px;height:16px;z-index:14;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">:</span></div>
<table style="position:absolute;left:8px;top:213px;width:973px;height:245px;z-index:15;" id="Table1">
<tr>
<td colspan="8" class="cell0"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"><strong>TEST DETAILS</strong></span></td>
<td colspan="2" class="cell1"><span style="color:#000000;font-family:Arial;font-size:16px;line-height:18px;"> <strong>Overall Analysis Result:</strong></span></td>
</tr>
<tr>
<td colspan="3" class="cell2"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;">Lab. Number&nbsp; </span></td>
<td class="cell3"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell3"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell3"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell3"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell3"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td colspan="2" class="cell4"><span style="color:#000000;font-family:Arial;font-size:16px;line-height:18px;">&nbsp; </span></td>
</tr>
<tr>
<td colspan="3" class="cell5"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;">Sampling Date</span></td>
<td class="cell6"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell6"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell6"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell6"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell6"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td colspan="2" class="cell5"><span style="color:#000000;font-family:Arial;font-size:16px;line-height:18px;">&nbsp; </span></td>
</tr>
<tr>
<td colspan="3" class="cell4"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;">Received Date</span></td>
<td class="cell3"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell3"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell3"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell3"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell3"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td colspan="2" class="cell4"><span style="color:#000000;font-family:Arial;font-size:16px;line-height:18px;">&nbsp; </span></td>
</tr>
<tr>
<td colspan="3" class="cell4"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;">Report Date</span></td>
<td class="cell3"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell3"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell3"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell3"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell3"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td colspan="2" class="cell4"><span style="color:#000000;font-family:Arial;font-size:16px;line-height:18px;">&nbsp; </span></td>
</tr>
<tr>
<td colspan="3" class="cell7"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;">Hours on Oil</span></td>
<td class="cell8"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell8"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell8"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell8"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell8"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td colspan="2" class="cell9"><span style="color:#000000;font-family:Arial;font-size:16px;line-height:18px;">&nbsp; <strong>SEVERE</strong></span></td>
</tr>
<tr>
<td class="cell10"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:18px;"><strong>Physical Test</strong> </span><span style="color:#000000;font-family:Arial;font-size:16px;line-height:18px;">&nbsp;&nbsp;&nbsp;&nbsp; </span></td>
<td class="cell10"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"><strong>Unit</strong></span></td>
<td class="cell10"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"><strong>Method</strong></span></td>
<td colspan="2" class="cell11">&nbsp;</td>
<td class="cell10"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"><strong>Test Value</strong></span></td>
<td colspan="3" class="cell11">&nbsp;</td>
<td class="cell11"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
</tr>
<tr>
<td colspan="3" class="cell12"><span style="color:#000000;font-family:Arial;font-size:16px;line-height:18px;">&nbsp;&nbsp; </span></td>
<td class="cell13"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell13"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell13"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell13"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell13"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell14"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell12"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
</tr>
<tr>
<td class="cell13"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell13"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell13"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell13"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell13"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell13"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell13"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell13"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell14"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell12"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
</tr>
<tr>
<td class="cell13"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell13"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell13"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell13"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell13"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell13"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell13"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell13"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell14"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
<td class="cell12"><span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> </span></td>
</tr>
</table>
<div id="wb_Shape3" style="position:absolute;left:769px;top:61px;width:211px;height:45px;z-index:16;">
<img src="<?php echo Url::base('').'/'.'report/images/img0001.png';?>" id="Shape3" alt="" style="width:211px;height:45px;"></div>
<div id="wb_Text11" style="position:absolute;left:783px;top:67px;width:192px;height:19px;z-index:17;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:16px;"><strong><u>OIL ANALYSIS REPORT</u></strong></span></div>
<div id="wb_Image4" style="position:absolute;left:867px;top:264px;width:42px;height:66px;z-index:18;">
<img src="<?php echo Url::base('').'/'.'report/images/logominyak.png';?>" id="Image4" alt=""></div>
<?php $this->endBody() ?> 
</body>
</html>
<?php $this->endPage() ?>