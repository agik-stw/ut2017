<?php
namespace app\access;
use yii\db\Query;
class NewOilAccess{
public static function accessData($dataId){
$query=new Query;

  //admin and ho role
if ($dataId=="admin" || $dataId=="ho") {
  $query->select(['tbl_new_oil.*','tbl_customers.Name','tbl_customers.Branch'])
->from('tbl_new_oil')
->join('JOIN',
'tbl_customers','
tbl_customers.CustomerID=tbl_new_oil.customer_id');
return $query->all();
}

//data fmcpusat
elseif ($dataId=="fmcpusat") {
  $query->select(['tbl_new_oil.*','tbl_customers.Name','tbl_customers.Branch'])
->from('tbl_new_oil')
->join('JOIN',
'tbl_customers','
tbl_customers.CustomerID=tbl_new_oil.customer_id')
  ->where(['substring(tbl_new_oil.group,1,3)'=>'fmc']);
  return $query->all();
}

//data fmc apa saja
elseif (substr($dataId,0,3)=="fmc" && strlen($dataId)>3) {
  $query->select(['tbl_new_oil.*','tbl_customers.Name','tbl_customers.Branch'])
->from('tbl_new_oil')
->join('JOIN',
'tbl_customers','
tbl_customers.CustomerID=tbl_new_oil.customer_id')
  ->where(['tbl_new_oil.group'=>$dataId]);
  return $query->all();
}

//branch,customer,grouploc
else{
  $query->select(['tbl_new_oil.*','tbl_customers.Name','tbl_customers.Branch'])
->from('tbl_new_oil')
->join('JOIN',
'tbl_customers','
tbl_customers.CustomerID=tbl_new_oil.customer_id')
  ->where(['tbl_new_oil.group'=>$dataId])
  ->orWhere(['tbl_new_oil.customer_id'=>$dataId]);
  return $query->all();
}

}

//fungsi select data by receive_date
public static function accessDataByReceiveDate($dataId,$date1,$date2){
$query=new Query;

  //admin and ho role
if ($dataId=="admin" || $dataId=="ho") {
  $query->select(['tbl_new_oil.*','tbl_customers.Name','tbl_customers.Branch'])
->from('tbl_new_oil')
->join('JOIN',
'tbl_customers','
tbl_customers.CustomerID=tbl_new_oil.customer_id')
  ->where(['between','tbl_new_oil.receive_date',$date1,$date2]);
return $query->all();
}

//data fmcpusat
elseif ($dataId=="fmcpusat") {
  $query->select(['tbl_new_oil.*','tbl_customers.Name','tbl_customers.Branch'])
->from('tbl_new_oil')
->join('JOIN',
'tbl_customers','
tbl_customers.CustomerID=tbl_new_oil.customer_id')
  ->where(['substring(tbl_new_oil.group,1,3)'=>'fmc'])
  ->andWhere(['between','tbl_new_oil.receive_date',$date1,$date2]);
  return $query->all();
}

//data fmc apa saja
elseif (substr($dataId,0,3)=="fmc" && strlen($dataId)>3) {
  $query->select(['tbl_new_oil.*','tbl_customers.Name','tbl_customers.Branch'])
->from('tbl_new_oil')
->join('JOIN',
'tbl_customers','
tbl_customers.CustomerID=tbl_new_oil.customer_id')
  ->where(['tbl_new_oil.group'=>$dataId])
  ->andWhere(['between','tbl_new_oil.receive_date',$date1,$date2]);
 return $query->all();
}

//branch,customer,grouploc
else{
  $query->select(['tbl_new_oil.*','tbl_customers.Name','tbl_customers.Branch'])
->from('tbl_new_oil')
->join('JOIN',
'tbl_customers','
tbl_customers.CustomerID=tbl_new_oil.customer_id')
  ->where(['tbl_new_oil.group'=>$dataId])
  ->orWhere(['tbl_new_oil.customer_id'=>$dataId])
  ->orWhere(['tbl_new_oil.branch_id'=>$dataId])
  ->andWhere(['between','tbl_new_oil.receive_date',$date1,$date2]);
  return $query->all();
}

}


//fungsi select data by sample_date
public static function accessDataBySampleDate($dataId,$date1,$date2){
$query=new Query;

  //admin and ho role
if ($dataId=="admin" || $dataId=="ho") {
  $query->select(['tbl_new_oil.*','tbl_customers.Name','tbl_customers.Branch'])
->from('tbl_new_oil')
->join('JOIN',
'tbl_customers','
tbl_customers.CustomerID=tbl_new_oil.customer_id')
  ->where(['between','tbl_new_oil.sample_date',$date1,$date2]);
return $query->all();
}

//data fmcpusat
elseif ($dataId=="fmcpusat") {
  $query->select(['tbl_new_oil.*','tbl_customers.Name','tbl_customers.Branch'])
->from('tbl_new_oil')
->join('JOIN',
'tbl_customers','
tbl_customers.CustomerID=tbl_new_oil.customer_id')
  ->where(['substring(tbl_new_oil.group,1,3)'=>'fmc'])
  ->andWhere(['between','tbl_new_oil.sample_date',$date1,$date2]);
  return $query->all();
}

//data fmc apa saja
elseif (substr($dataId,0,3)=="fmc" && strlen($dataId)>3) {
  $query->select(['tbl_new_oil.*','tbl_customers.Name','tbl_customers.Branch'])
->from('tbl_new_oil')
->join('JOIN',
'tbl_customers','
tbl_customers.CustomerID=tbl_new_oil.customer_id')
  ->where(['tbl_new_oil.group'=>$dataId])
  ->andWhere(['between','tbl_new_oil.sample_date',$date1,$date2]);
  return $query->all();
}

//branch,customer,grouploc
else{
  $query->select(['tbl_new_oil.*','tbl_customers.Name','tbl_customers.Branch'])
->from('tbl_new_oil')
->join('JOIN',
'tbl_customers','
tbl_customers.CustomerID=tbl_new_oil.customer_id')
  ->where(['tbl_new_oil.group'=>$dataId])
  ->orWhere(['tbl_new_oil.customer_id'=>$dataId])
  ->orWhere(['tbl_new_oil.branch_id'=>$dataId])
  ->andWhere(['between','tbl_new_oil.sample_date',$date1,$date2]);
 return $query->all();
}

}


//fungsi select data by sample_date
public static function accessDataByReportDate($dataId,$date1,$date2){
$query=new Query;

  //admin and ho role
if ($dataId=="admin" || $dataId=="ho") {
  $query->select(['tbl_new_oil.*','tbl_customers.Name','tbl_customers.Branch'])
->from('tbl_new_oil')
->join('JOIN',
'tbl_customers','
tbl_customers.CustomerID=tbl_new_oil.customer_id')
  ->where(['between','tbl_new_oil.analysis_date',$date1,$date2]);
return $query->all();
}

//data fmcpusat
elseif ($dataId=="fmcpusat") {
   $query->select(['tbl_new_oil.*','tbl_customers.Name','tbl_customers.Branch'])
->from('tbl_new_oil')
->join('JOIN',
'tbl_customers','
tbl_customers.CustomerID=tbl_new_oil.customer_id')
  ->where(['substring(tbl_new_oil.group,1,3)'=>'fmc'])
  ->andWhere(['between','tbl_new_oil.analysis_date',$date1,$date2]);
  return $query->all();
}

//data fmc apa saja
elseif (substr($dataId,0,3)=="fmc" && strlen($dataId)>3) {
   $query->select(['tbl_new_oil.*','tbl_customers.Name','tbl_customers.Branch'])
->from('tbl_new_oil')
->join('JOIN',
'tbl_customers','
tbl_customers.CustomerID=tbl_new_oil.customer_id')
  ->where(['tbl_new_oil.group'=>$dataId])
  ->andWhere(['between','tbl_new_oil.analysis_date',$date1,$date2]);
  return $query->all();
}

//branch,customer,grouploc
else{
   $query->select(['tbl_new_oil.*','tbl_customers.Name','tbl_customers.Branch'])
->from('tbl_new_oil')
->join('JOIN',
'tbl_customers','
tbl_customers.CustomerID=tbl_new_oil.customer_id')
  ->where(['tbl_new_oil.group'=>$dataId])
  ->orWhere(['tbl_new_oil.customer_id'=>$dataId])
  ->orWhere(['tbl_new_oil.branch_id'=>$dataId])
  ->andWhere(['between','tbl_new_oil.analysis_date',$date1,$date2]);
  return $query->all();
}

}

}
