<?php
namespace app\access;
use yii\db\Query;
class FuelAccess{
public static function accessData($dataId){
$query=new Query;

  //admin and ho role
if ($dataId=="admin" || $dataId=="ho") {
  $query->select(['tbl_fuel.*','tbl_departement.departement_name','tbl_customers.Name','tbl_customers.Branch'])
  ->from('tbl_fuel')
  ->join('JOIN',
  'tbl_departement','
  tbl_departement.departement_id=tbl_fuel.departement_id')
  ->join('JOIN',
  'tbl_customers','
  tbl_customers.CustomerID=tbl_fuel.customer_id');
return $query->all();
}

//data fmcpusat
elseif ($dataId=="fmcpusat") {
  $query->select(['tbl_fuel.*','tbl_departement.departement_name','tbl_customers.Name','tbl_customers.Branch'])
  ->from('tbl_fuel')
  ->join('JOIN',
  'tbl_departement','
  tbl_departement.departement_id=tbl_fuel.departement_id')
  ->join('JOIN',
  'tbl_customers','
  tbl_customers.CustomerID=tbl_fuel.customer_id')
  ->where(['substring(tbl_fuel.group,1,3)'=>'fmc']);
  return $query->all();
}

//data fmc apa saja
elseif (substr($dataId,0,3)=="fmc" && strlen($dataId)>3) {
  $query->select(['tbl_fuel.*','tbl_departement.departement_name','tbl_customers.Name','tbl_customers.Branch'])
  ->from('tbl_fuel')
  ->join('JOIN',
  'tbl_departement','
  tbl_departement.departement_id=tbl_fuel.departement_id')
  ->join('JOIN',
  'tbl_customers','
  tbl_customers.CustomerID=tbl_fuel.customer_id')
  ->where(['tbl_fuel.group'=>$dataId]);
  return $query->all();
}

//branch,customer,grouploc
else{
  $query->select(['tbl_fuel.*','tbl_departement.departement_name','tbl_customers.Name','tbl_customers.Branch'])
  ->from('tbl_fuel')
  ->join('JOIN',
  'tbl_departement','
  tbl_departement.departement_id=tbl_fuel.departement_id')
  ->join('JOIN',
  'tbl_customers','
  tbl_customers.CustomerID=tbl_fuel.customer_id')
  ->where(['tbl_fuel.group'=>$dataId])
  ->orWhere(['tbl_fuel.customer_id'=>$dataId]);
  return $query->all();
}

}

//fungsi select data by receive_date
public static function accessDataByReceiveDate($dataId,$date1,$date2){
$query=new Query;

  //admin and ho role
if ($dataId=="admin" || $dataId=="ho") {
  $query->select(['tbl_fuel.*','tbl_departement.departement_name','tbl_customers.Name','tbl_customers.Branch'])
  ->from('tbl_fuel')
  ->join('JOIN',
  'tbl_departement','
  tbl_departement.departement_id=tbl_fuel.departement_id')
  ->join('JOIN',
  'tbl_customers','
  tbl_customers.CustomerID=tbl_fuel.customer_id')
  ->where(['between','tbl_fuel.receive_date',$date1,$date2]);
return $query->all();
}

//data fmcpusat
elseif ($dataId=="fmcpusat") {
  $query->select(['tbl_fuel.*','tbl_departement.departement_name','tbl_customers.Name','tbl_customers.Branch'])
  ->from('tbl_fuel')
  ->join('JOIN',
  'tbl_departement','
  tbl_departement.departement_id=tbl_fuel.departement_id')
  ->join('JOIN',
  'tbl_customers','
  tbl_customers.CustomerID=tbl_fuel.customer_id')
  ->where(['substring(tbl_fuel.group,1,3)'=>'fmc'])
  ->andWhere(['between','tbl_fuel.receive_date',$date1,$date2]);
  return $query->all();
}

//data fmc apa saja
elseif (substr($dataId,0,3)=="fmc" && strlen($dataId)>3) {
  $query->select(['tbl_fuel.*','tbl_departement.departement_name','tbl_customers.Name','tbl_customers.Branch'])
  ->from('tbl_fuel')
  ->join('JOIN',
  'tbl_departement','
  tbl_departement.departement_id=tbl_fuel.departement_id')
  ->join('JOIN',
  'tbl_customers','
  tbl_customers.CustomerID=tbl_fuel.customer_id')
  ->where(['tbl_fuel.group'=>$dataId])
  ->andWhere(['between','tbl_fuel.receive_date',$date1,$date2]);
 return $query->all();
}

//branch,customer,grouploc
else{
  $query->select(['tbl_fuel.*','tbl_departement.departement_name','tbl_customers.Name','tbl_customers.Branch'])
  ->from('tbl_fuel')
  ->join('JOIN',
  'tbl_departement','
  tbl_departement.departement_id=tbl_fuel.departement_id')
  ->join('JOIN',
  'tbl_customers','
  tbl_customers.CustomerID=tbl_fuel.customer_id')
  ->where(['tbl_fuel.group'=>$dataId])
  ->orWhere(['tbl_fuel.customer_id'=>$dataId])
  ->orWhere(['tbl_fuel.branch_id'=>$dataId])
  ->andWhere(['between','tbl_fuel.receive_date',$date1,$date2]);
  return $query->all();
}

}


//fungsi select data by sample_date
public static function accessDataBySampleDate($dataId,$date1,$date2){
$query=new Query;

  //admin and ho role
if ($dataId=="admin" || $dataId=="ho") {
  $query->select(['tbl_fuel.*','tbl_departement.departement_name','tbl_customers.Name','tbl_customers.Branch'])
  ->from('tbl_fuel')
  ->join('JOIN',
  'tbl_departement','
  tbl_departement.departement_id=tbl_fuel.departement_id')
  ->join('JOIN',
  'tbl_customers','
  tbl_customers.CustomerID=tbl_fuel.customer_id')
  ->where(['between','tbl_fuel.sample_date',$date1,$date2]);
return $query->all();
}

//data fmcpusat
elseif ($dataId=="fmcpusat") {
  $query->select(['tbl_fuel.*','tbl_departement.departement_name','tbl_customers.Name','tbl_customers.Branch'])
  ->from('tbl_fuel')
  ->join('JOIN',
  'tbl_departement','
  tbl_departement.departement_id=tbl_fuel.departement_id')
  ->join('JOIN',
  'tbl_customers','
  tbl_customers.CustomerID=tbl_fuel.customer_id')
  ->where(['substring(tbl_fuel.group,1,3)'=>'fmc'])
  ->andWhere(['between','tbl_fuel.sample_date',$date1,$date2]);
  return $query->all();
}

//data fmc apa saja
elseif (substr($dataId,0,3)=="fmc" && strlen($dataId)>3) {
  $query->select(['tbl_fuel.*','tbl_departement.departement_name','tbl_customers.Name','tbl_customers.Branch'])
  ->from('tbl_fuel')
  ->join('JOIN',
  'tbl_departement','
  tbl_departement.departement_id=tbl_fuel.departement_id')
  ->join('JOIN',
  'tbl_customers','
  tbl_customers.CustomerID=tbl_fuel.customer_id')
  ->where(['tbl_fuel.group'=>$dataId])
  ->andWhere(['between','tbl_fuel.sample_date',$date1,$date2]);
  return $query->all();
}

//branch,customer,grouploc
else{
  $query->select(['tbl_fuel.*','tbl_departement.departement_name','tbl_customers.Name','tbl_customers.Branch'])
  ->from('tbl_fuel')
  ->join('JOIN',
  'tbl_departement','
  tbl_departement.departement_id=tbl_fuel.departement_id')
  ->join('JOIN',
  'tbl_customers','
  tbl_customers.CustomerID=tbl_fuel.customer_id')
  ->where(['tbl_fuel.group'=>$dataId])
  ->orWhere(['tbl_fuel.customer_id'=>$dataId])
  ->orWhere(['tbl_fuel.branch_id'=>$dataId])
  ->andWhere(['between','tbl_fuel.sample_date',$date1,$date2]);
 return $query->all();
}

}


//fungsi select data by sample_date
public static function accessDataByReportDate($dataId,$date1,$date2){
$query=new Query;

  //admin and ho role
if ($dataId=="admin" || $dataId=="ho") {
  $query->select(['tbl_fuel.*','tbl_departement.departement_name','tbl_customers.Name','tbl_customers.Branch'])
  ->from('tbl_fuel')
  ->join('JOIN',
  'tbl_departement','
  tbl_departement.departement_id=tbl_fuel.departement_id')
  ->join('JOIN',
  'tbl_customers','
  tbl_customers.CustomerID=tbl_fuel.customer_id')
  ->where(['between','tbl_fuel.report_date',$date1,$date2]);
return $query->all();
}

//data fmcpusat
elseif ($dataId=="fmcpusat") {
  $query->select(['tbl_fuel.*','tbl_departement.departement_name','tbl_customers.Name','tbl_customers.Branch'])
  ->from('tbl_fuel')
  ->join('JOIN',
  'tbl_departement','
  tbl_departement.departement_id=tbl_fuel.departement_id')
  ->join('JOIN',
  'tbl_customers','
  tbl_customers.CustomerID=tbl_fuel.customer_id')
  ->where(['substring(tbl_fuel.group,1,3)'=>'fmc'])
  ->andWhere(['between','tbl_fuel.report_date',$date1,$date2]);
  return $query->all();
}

//data fmc apa saja
elseif (substr($dataId,0,3)=="fmc" && strlen($dataId)>3) {
  $query->select(['tbl_fuel.*','tbl_departement.departement_name','tbl_customers.Name','tbl_customers.Branch'])
  ->from('tbl_fuel')
  ->join('JOIN',
  'tbl_departement','
  tbl_departement.departement_id=tbl_fuel.departement_id')
  ->join('JOIN',
  'tbl_customers','
  tbl_customers.CustomerID=tbl_fuel.customer_id')
  ->where(['tbl_fuel.group'=>$dataId])
  ->andWhere(['between','tbl_fuel.report_date',$date1,$date2]);
  return $query->all();
}

//branch,customer,grouploc
else{
  $query->select(['tbl_fuel.*','tbl_departement.departement_name','tbl_customers.Name','tbl_customers.Branch'])
  ->from('tbl_fuel')
  ->join('JOIN',
  'tbl_departement','
  tbl_departement.departement_id=tbl_fuel.departement_id')
  ->join('JOIN',
  'tbl_customers','
  tbl_customers.CustomerID=tbl_fuel.customer_id')
  ->where(['tbl_fuel.group'=>$dataId])
  ->orWhere(['tbl_fuel.customer_id'=>$dataId])
  ->orWhere(['tbl_fuel.branch_id'=>$dataId])
  ->andWhere(['between','tbl_fuel.report_date',$date1,$date2]);
  return $query->all();
}

}

}
