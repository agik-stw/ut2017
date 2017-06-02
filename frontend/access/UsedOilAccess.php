<?php
namespace app\access;
use yii\db\Query;
use Yii;
class UsedOilAccess{
public static function accessData($dataId){
$query=new Query;

  //admin and ho role
if ($dataId=="admin" || $dataId=="ho") {
	$query->select(['tbl_transaction.grouploc','tbl_transaction.branch','tbl_transaction.name as customer_name',
	'tbl_transaction.lab_no','tbl_transaction.sampl_dt1 as sample_date','tbl_transaction.recv_dt1 as receive_date',
'tbl_transaction.rpt_dt1 as report_date','tbl_transaction.unit_no as unit_number','tbl_transaction.COMPONENT as component_name','tbl_transaction.model','tbl_transaction.oil_change','tbl_transaction.filter_code','(select "") as cmp',
'(select "") as mp','(select case tbl_transaction.eval_code when "N" then "Normal"
when "B" then "Attention"
when "C" then "Urgent"
when " " then "Normal"
when null then "Normal" end) as eval_code','(select "")as blank'])
  ->from('tbl_transaction')
  ->limit(10000);
return $query->all();
}

//data fmcpusat
elseif ($dataId=="fmcpusat") {
	$query->select(['tbl_transaction.grouploc','tbl_transaction.branch','tbl_transaction.name as customer_name',
	'tbl_transaction.lab_no','tbl_transaction.sampl_dt1 as sample_date','tbl_transaction.recv_dt1 as receive_date',
'tbl_transaction.rpt_dt1 as report_date','tbl_transaction.unit_no as unit_number','tbl_transaction.COMPONENT as component_name','tbl_transaction.model','tbl_transaction.oil_change','tbl_transaction.filter_code','(select "") as cmp',
'(select "") as mp','(select case tbl_transaction.eval_code when "N" then "Normal"
when "B" then "Attention"
when "C" then "Urgent"
when " " then "Normal"
when null then "Normal" end) as eval_code','(select "")as blank'])
  ->from('tbl_transaction')
  ->where(['substring(tbl_transaction.grouploc,1,3)'=>'fmc'])
  ->limit(10000);
  return $query->all();
}

//data fmc apa saja
elseif (substr($dataId,0,3)=="fmc" && strlen($dataId)>3) {
	$query->select(['tbl_transaction.grouploc','tbl_transaction.branch','tbl_transaction.name as customer_name',
	'tbl_transaction.lab_no','tbl_transaction.sampl_dt1 as sample_date','tbl_transaction.recv_dt1 as receive_date',
'tbl_transaction.rpt_dt1 as report_date','tbl_transaction.unit_no as unit_number','tbl_transaction.COMPONENT as component_name','tbl_transaction.model','tbl_transaction.oil_change','tbl_transaction.filter_code','(select "") as cmp',
'(select "") as mp','(select case tbl_transaction.eval_code when "N" then "Normal"
when "B" then "Attention"
when "C" then "Urgent"
when " " then "Normal"
when null then "Normal" end) as eval_code','(select "")as blank'])
  ->from('tbl_transaction')
  ->where(['tbl_transaction.grouploc'=>$dataId])
	->limit(10000);
  return $query->all();
}

//branch,customer,grouploc
else{
	$query->select(['tbl_transaction.grouploc','tbl_transaction.branch','tbl_transaction.name as customer_name',
	'tbl_transaction.lab_no','tbl_transaction.sampl_dt1 as sample_date','tbl_transaction.recv_dt1 as receive_date',
'tbl_transaction.rpt_dt1 as report_date','tbl_transaction.unit_no as unit_number','tbl_transaction.COMPONENT as component_name','tbl_transaction.model','tbl_transaction.oil_change','tbl_transaction.filter_code','(select "") as cmp',
'(select "") as mp','(select case tbl_transaction.eval_code when "N" then "Normal"
when "B" then "Attention"
when "C" then "Urgent"
when " " then "Normal"
when null then "Normal" end) as eval_code','(select "")as blank'])
  ->from('tbl_transaction')
  ->where(['tbl_transaction.grouploc'=>$dataId])
  ->orWhere(['tbl_transaction.customer_id'=>$dataId])
  ->orWhere(['tbl_transaction.branch'=>$dataId]);
  return $query->all();
}

}

//fungsi select data by receive_date
public static function accessDataByReceiveDate($dataId,$date1,$date2){
/*\Yii::$app->response->format=\Yii\web\Response::FORMAT_JSON;*/
$query=new Query;

  //admin and ho role
if ($dataId=="admin" || $dataId=="ho") {
	$query->select(['tbl_transaction.grouploc','tbl_transaction.branch','tbl_transaction.name as customer_name',
	'tbl_transaction.lab_no','tbl_transaction.sampl_dt1 as sample_date','tbl_transaction.recv_dt1 as receive_date',
'tbl_transaction.rpt_dt1 as report_date','tbl_transaction.unit_no as unit_number','tbl_transaction.COMPONENT as component_name','tbl_transaction.model','tbl_transaction.oil_change','tbl_transaction.filter_code','(select "") as cmp',
'(select "") as mp','(select case tbl_transaction.eval_code when "N" then "Normal"
when "B" then "Attention"
when "C" then "Urgent"
when " " then "Normal"
when null then "Normal" end) as eval_code','(select "")as blank'])
  ->from('tbl_transaction')
  ->where(['between','tbl_transaction.recv_dt1',$date1,$date2]);
return $query->all();
}

//data fmcpusat
elseif ($dataId=="fmcpusat") {
	$query->select(['tbl_transaction.grouploc','tbl_transaction.branch','tbl_transaction.name as customer_name',
	'tbl_transaction.lab_no','tbl_transaction.sampl_dt1 as sample_date','tbl_transaction.recv_dt1 as receive_date',
'tbl_transaction.rpt_dt1 as report_date','tbl_transaction.unit_no as unit_number','tbl_transaction.COMPONENT as component_name','tbl_transaction.model','tbl_transaction.oil_change','tbl_transaction.filter_code','(select "") as cmp',
'(select "") as mp','(select case tbl_transaction.eval_code when "N" then "Normal"
when "B" then "Attention"
when "C" then "Urgent"
when " " then "Normal"
when null then "Normal" end) as eval_code','(select "")as blank'])
  ->from('tbl_transaction')
  ->where(['substring(tbl_transaction.grouploc,1,3)'=>'fmc'])
  ->andWhere(['between','tbl_transaction.recv_dt1',$date1,$date2]);
  return $query->all();
}

//data fmc apa saja
elseif (substr($dataId,0,3)=="fmc" && strlen($dataId)>3) {
  $query->select(['tbl_transaction.grouploc','tbl_transaction.branch','tbl_transaction.name as customer_name',
  'tbl_transaction.lab_no','tbl_transaction.sampl_dt1 as sample_date','tbl_transaction.recv_dt1 as receive_date',
'tbl_transaction.rpt_dt1 as report_date','tbl_transaction.unit_no as unit_number','tbl_transaction.COMPONENT as component_name','tbl_transaction.model','tbl_transaction.oil_change','tbl_transaction.filter_code','(select "") as cmp',
'(select "") as mp','(select case tbl_transaction.eval_code when "N" then "Normal"
when "B" then "Attention"
when "C" then "Urgent"
when " " then "Normal"
when null then "Normal" end) as eval_code','(select "")as blank'])
  ->from('tbl_transaction')
  ->where(['tbl_transaction.grouploc'=>$dataId])
  ->andWhere(['between','tbl_transaction.recv_dt1',$date1,$date2]);
  return $query->all();
}

//branch,customer,grouploc
else{
  $query->select(['tbl_transaction.grouploc','tbl_transaction.branch','tbl_transaction.name as customer_name',
  'tbl_transaction.lab_no','tbl_transaction.sampl_dt1 as sample_date','tbl_transaction.recv_dt1 as receive_date',
'tbl_transaction.rpt_dt1 as report_date','tbl_transaction.unit_no as unit_number','tbl_transaction.COMPONENT as component_name','tbl_transaction.model','tbl_transaction.oil_change','tbl_transaction.filter_code','(select "") as cmp',
'(select "") as mp','(select case tbl_transaction.eval_code when "N" then "Normal"
when "B" then "Attention"
when "C" then "Urgent"
when " " then "Normal"
when null then "Normal" end) as eval_code','(select "")as blank'])
  ->from('tbl_transaction')
  ->where(['tbl_transaction.grouploc'=>$dataId])
  ->orWhere(['tbl_transaction.customer_id'=>$dataId])
  ->orWhere(['tbl_transaction.branch'=>$dataId])
  ->andWhere(['between','tbl_transaction.recv_dt1',$date1,$date2]);
  return $query->all();
}

}


//fungsi select data by sample_date
public static function accessDataBySampleDate($dataId,$date1,$date2){
$query=new Query;

  //admin and ho role
if ($dataId=="admin" || $dataId=="ho") {
  $query->select(['tbl_transaction.grouploc','tbl_transaction.branch','tbl_transaction.name as customer_name',
  'tbl_transaction.lab_no','tbl_transaction.sampl_dt1 as sample_date','tbl_transaction.recv_dt1 as receive_date',
'tbl_transaction.rpt_dt1 as report_date','tbl_transaction.unit_no as unit_number','tbl_transaction.COMPONENT as component_name','tbl_transaction.model','tbl_transaction.oil_change','tbl_transaction.filter_code','(select "") as cmp',
'(select "") as mp','(select case tbl_transaction.eval_code when "N" then "Normal"
when "B" then "Attention"
when "C" then "Urgent"
when " " then "Normal"
when null then "Normal" end) as eval_code','(select "")as blank'])
  ->from('tbl_transaction')
  ->where(['between','tbl_transaction.sampl_dt1',$date1,$date2]);
return $query->all();
}

//data fmcpusat
elseif ($dataId=="fmcpusat") {
  $query->select(['tbl_transaction.grouploc','tbl_transaction.branch','tbl_transaction.name as customer_name',
  'tbl_transaction.lab_no','tbl_transaction.sampl_dt1 as sample_date','tbl_transaction.recv_dt1 as receive_date',
'tbl_transaction.rpt_dt1 as report_date','tbl_transaction.unit_no as unit_number','tbl_transaction.COMPONENT as component_name','tbl_transaction.model','tbl_transaction.oil_change','tbl_transaction.filter_code','(select "") as cmp',
'(select "") as mp','(select case tbl_transaction.eval_code when "N" then "Normal"
when "B" then "Attention"
when "C" then "Urgent"
when " " then "Normal"
when null then "Normal" end) as eval_code','(select "")as blank'])
  ->from('tbl_transaction')
  ->where(['substring(tbl_transaction.grouploc,1,3)'=>'fmc'])
  ->andWhere(['between','tbl_transaction.sampl_dt1',$date1,$date2]);
  return $query->all();
}

//data fmc apa saja
elseif (substr($dataId,0,3)=="fmc" && strlen($dataId)>3) {
  $query->select(['tbl_transaction.grouploc','tbl_transaction.branch','tbl_transaction.name as customer_name',
  'tbl_transaction.lab_no','tbl_transaction.sampl_dt1 as sample_date','tbl_transaction.recv_dt1 as receive_date',
'tbl_transaction.rpt_dt1 as report_date','tbl_transaction.unit_no as unit_number','tbl_transaction.COMPONENT as component_name','tbl_transaction.model','tbl_transaction.oil_change','tbl_transaction.filter_code','(select "") as cmp',
'(select "") as mp','(select case tbl_transaction.eval_code when "N" then "Normal"
when "B" then "Attention"
when "C" then "Urgent"
when " " then "Normal"
when null then "Normal" end) as eval_code','(select "")as blank'])
  ->from('tbl_transaction')
  ->where(['tbl_transaction.grouploc'=>$dataId])
  ->andWhere(['between','tbl_transaction.sampl_dt1',$date1,$date2]);
  return $query->all();
}

//branch,customer,grouploc
else{
  $query->select(['tbl_transaction.grouploc','tbl_transaction.branch','tbl_transaction.name as customer_name',
  'tbl_transaction.lab_no','tbl_transaction.sampl_dt1 as sample_date','tbl_transaction.recv_dt1 as receive_date',
'tbl_transaction.rpt_dt1 as report_date','tbl_transaction.unit_no as unit_number','tbl_transaction.COMPONENT as component_name','tbl_transaction.model','tbl_transaction.oil_change','tbl_transaction.filter_code','(select "") as cmp',
'(select "") as mp','(select case tbl_transaction.eval_code when "N" then "Normal"
when "B" then "Attention"
when "C" then "Urgent"
when " " then "Normal"
when null then "Normal" end) as eval_code','(select "")as blank'])
  ->from('tbl_transaction')
  ->where(['tbl_transaction.grouploc'=>$dataId])
  ->orWhere(['tbl_transaction.customer_id'=>$dataId])
  ->orWhere(['tbl_transaction.branch'=>$dataId])
  ->andWhere(['between','tbl_transaction.sampl_dt1',$date1,$date2]);
  return $query->all();
}

}


//fungsi select data by sample_date
public static function accessDataByReportDate($dataId,$date1,$date2){
$query=new Query;

 //admin and ho role
if ($dataId=="admin" || $dataId=="ho") {
  $query->select(['tbl_transaction.grouploc','tbl_transaction.branch','tbl_transaction.name as customer_name',
  'tbl_transaction.lab_no','tbl_transaction.sampl_dt1 as sample_date','tbl_transaction.recv_dt1 as receive_date',
'tbl_transaction.rpt_dt1 as report_date','tbl_transaction.unit_no as unit_number','tbl_transaction.COMPONENT as component_name','tbl_transaction.model','tbl_transaction.oil_change','tbl_transaction.filter_code','(select "") as cmp',
'(select "") as mp','(select case tbl_transaction.eval_code when "N" then "Normal"
when "B" then "Attention"
when "C" then "Urgent"
when " " then "Normal"
when null then "Normal" end) as eval_code','(select "")as blank'])
  ->from('tbl_transaction')
  ->where(['between','tbl_transaction.rpt_dt1',$date1,$date2]);
return $query->all();
}

//data fmcpusat
elseif ($dataId=="fmcpusat") {
  $query->select(['tbl_transaction.grouploc','tbl_transaction.branch','tbl_transaction.name as customer_name',
  'tbl_transaction.lab_no','tbl_transaction.sampl_dt1 as sample_date','tbl_transaction.recv_dt1 as receive_date',
'tbl_transaction.rpt_dt1 as report_date','tbl_transaction.unit_no as unit_number','tbl_transaction.COMPONENT as component_name','tbl_transaction.model','tbl_transaction.oil_change','tbl_transaction.filter_code','(select "") as cmp',
'(select "") as mp','(select case tbl_transaction.eval_code when "N" then "Normal"
when "B" then "Attention"
when "C" then "Urgent"
when " " then "Normal"
when null then "Normal" end) as eval_code','(select "")as blank'])
  ->from('tbl_transaction')
  ->where(['substring(tbl_transaction.grouploc,1,3)'=>'fmc'])
  ->andWhere(['between','tbl_transaction.rpt_dt1',$date1,$date2]);
  return $query->all();
}

//data fmc apa saja
elseif (substr($dataId,0,3)=="fmc" && strlen($dataId)>3) {
  $query->select(['tbl_transaction.grouploc','tbl_transaction.branch','tbl_transaction.name as customer_name',
  'tbl_transaction.lab_no','tbl_transaction.sampl_dt1 as sample_date','tbl_transaction.recv_dt1 as receive_date',
'tbl_transaction.rpt_dt1 as report_date','tbl_transaction.unit_no as unit_number','tbl_transaction.COMPONENT as component_name','tbl_transaction.model','tbl_transaction.oil_change','tbl_transaction.filter_code','(select "") as cmp',
'(select "") as mp','(select case tbl_transaction.eval_code when "N" then "Normal"
when "B" then "Attention"
when "C" then "Urgent"
when " " then "Normal"
when null then "Normal" end) as eval_code','(select "")as blank'])
  ->from('tbl_transaction')
  ->where(['tbl_transaction.grouploc'=>$dataId])
  ->andWhere(['between','tbl_transaction.rpt_dt1',$date1,$date2]);
 return $query->all();
}

//branch,customer,grouploc
else{
  $query->select(['tbl_transaction.grouploc','tbl_transaction.branch','tbl_transaction.name as customer_name',
  'tbl_transaction.lab_no','tbl_transaction.sampl_dt1 as sample_date','tbl_transaction.recv_dt1 as receive_date',
'tbl_transaction.rpt_dt1 as report_date','tbl_transaction.unit_no as unit_number','tbl_transaction.COMPONENT as component_name','tbl_transaction.model','tbl_transaction.oil_change','tbl_transaction.filter_code','(select "") as cmp',
'(select "") as mp','(select case tbl_transaction.eval_code when "N" then "Normal"
when "B" then "Attention"
when "C" then "Urgent"
when " " then "Normal"
when null then "Normal" end) as eval_code','(select "")as blank'])
  ->from('tbl_transaction')
  ->where(['tbl_transaction.grouploc'=>$dataId])
  ->orWhere(['tbl_transaction.customer_id'=>$dataId])
  ->orWhere(['tbl_transaction.branch'=>$dataId])
  ->andWhere(['between','tbl_transaction.rpt_dt1',$date1,$date2]);
  return $query->all();
}

}

}
