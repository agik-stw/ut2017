<?php

namespace app\modules\monitoring\used_oil\controllers;
use app\storeprocedure\UsedOil;
use yii\helpers\Json;
use app\models\TbTransaction;
use kartik\mpdf\Pdf;
/*use app\plugins\fpdf181\FPDF;*/
use Yii;
use app\access\UsedOilAccess;

//datatables
use db2\config\Configdb;
//doctrine lib
use Doctrine\DataTables;


class ActionController extends \yii\web\Controller
{
    public function actionIndex()
    {
        /*return $this->render('index');*/
    }

    //get all data
        public function actionGetdata()
        {
          \Yii::$app->response->format=\Yii\web\Response::FORMAT_JSON;

          $this->enableCsrfValidation = false;
          $session=Yii::$app->session;
          $dataId=$session->get('data_id');
/*return ['data'=>UsedOilAccess::accessData($dataId)];*/

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
$sql="tbl_transaction.grouploc,tbl_transaction.branch,tbl_transaction.name,tbl_transaction.Lab_No,
tbl_transaction.SAMPL_DT1,tbl_transaction.RECV_DT1,tbl_transaction.RPT_DT1,
tbl_transaction.UNIT_NO,tbl_transaction.COMPONENT,tbl_transaction.MODEL,
tbl_transaction.oil_change,tbl_transaction.EVAL_CODE";
$where="substring(tbl_transaction.grouploc,1,3)='FMC' and tbl_transaction.grouploc!='' and tbl_transaction.rpt_dt1 > (DATE_SUB(CURDATE(), INTERVAL 3 YEAR))";


$config = new \Doctrine\DBAL\Configuration();
$connectionParams =Configdb::$params;
$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);

$datatables = (new DataTables\Builder())
    ->withQueryBuilder(
        $conn->createQueryBuilder()
            ->select($sql)
            ->from('tbl_transaction')
            ->where($where)
    )
    ->withRequestParams($_REQUEST);
return $datatables->getResponse();
 
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

    //get data by receive date
        public function actionGet_by_receive_date()
        {
          \Yii::$app->response->format=\Yii\web\Response::FORMAT_JSON;

          $this->enableCsrfValidation = true;
          $session=Yii::$app->session;
          $dataId=$session->get('data_id');
          $date1=$_REQUEST['date1'];
          $date2=$_REQUEST['date2'];
   /* return ['data'=>UsedOilAccess::accessDataByReceiveDate($dataId,$date1,$date2)];*/
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
$sql="tbl_transaction.grouploc,tbl_transaction.branch,tbl_transaction.name,tbl_transaction.Lab_No,
tbl_transaction.SAMPL_DT1,tbl_transaction.RECV_DT1,tbl_transaction.RPT_DT1,
tbl_transaction.UNIT_NO,tbl_transaction.COMPONENT,tbl_transaction.MODEL,
tbl_transaction.oil_change,tbl_transaction.EVAL_CODE";
$where="(tbl_transaction.RECV_DT1 between '$date1' and '$date2') and substring(tbl_transaction.grouploc,1,3)='FMC' and tbl_transaction.grouploc !='' and tbl_transaction.rpt_dt1 > (DATE_SUB(CURDATE(), INTERVAL 3 YEAR))";

$config = new \Doctrine\DBAL\Configuration();
$connectionParams =Configdb::$params;
$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);

$datatables = (new DataTables\Builder())
    ->withQueryBuilder(
        $conn->createQueryBuilder()
            ->select($sql)
            ->from('tbl_transaction')
            ->where($where)
    )
    ->withRequestParams($_GET);
return $datatables->getResponse();
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

        //get data by sample date
            public function actionGet_by_sample_date()
            {
              \Yii::$app->response->format=\Yii\web\Response::FORMAT_JSON;

              $this->enableCsrfValidation = true;
              $session=Yii::$app->session;
              $dataId=$session->get('data_id');
              $date1=$_REQUEST['date1'];
              $date2=$_REQUEST['date2'];
        /*return ['data'=>UsedOilAccess::accessDataBySampleDate($dataId,$date1,$date2)];*/
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
  $sql="tbl_transaction.grouploc,tbl_transaction.branch,tbl_transaction.name,tbl_transaction.Lab_No,
tbl_transaction.SAMPL_DT1,tbl_transaction.RECV_DT1,tbl_transaction.RPT_DT1,
tbl_transaction.UNIT_NO,tbl_transaction.COMPONENT,tbl_transaction.MODEL,
tbl_transaction.oil_change,tbl_transaction.EVAL_CODE";
$where="(tbl_transaction.SAMPL_DT1 between '$date1' and '$date2') and substring(tbl_transaction.grouploc,1,3)='FMC' and tbl_transaction.grouploc !='' and tbl_transaction.rpt_dt1 > (DATE_SUB(CURDATE(), INTERVAL 3 YEAR))";

$config = new \Doctrine\DBAL\Configuration();
$connectionParams =Configdb::$params;
$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);

$datatables = (new DataTables\Builder())
    ->withQueryBuilder(
        $conn->createQueryBuilder()
            ->select($sql)
            ->from('tbl_transaction')
            ->where($where)
    )
    ->withRequestParams($_GET);
return $datatables->getResponse();
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

            //get data by report date
                public function actionGet_by_report_date()
                {
                  \Yii::$app->response->format=\Yii\web\Response::FORMAT_JSON;

                  $this->enableCsrfValidation = true;
                  $session=Yii::$app->session;
                  $dataId=$session->get('data_id');
                  $date1=$_REQUEST['date1'];
                  $date2=$_REQUEST['date2'];
            /*return ['data'=>UsedOilAccess::accessDataByReportDate($dataId,$date1,$date2)];*/
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
  $sql="tbl_transaction.grouploc,tbl_transaction.branch,tbl_transaction.name,tbl_transaction.Lab_No,
tbl_transaction.SAMPL_DT1,tbl_transaction.RECV_DT1,tbl_transaction.RPT_DT1,
tbl_transaction.UNIT_NO,tbl_transaction.COMPONENT,tbl_transaction.MODEL,
tbl_transaction.oil_change,tbl_transaction.EVAL_CODE";
$where="(tbl_transaction.RPT_DT1 between '$date1' and '$date2') and substring(tbl_transaction.grouploc,1,3)='FMC' and tbl_transaction.grouploc !='' and tbl_transaction.rpt_dt1 > (DATE_SUB(CURDATE(), INTERVAL 3 YEAR))";

$config = new \Doctrine\DBAL\Configuration();
$connectionParams =Configdb::$params;
$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);

$datatables = (new DataTables\Builder())
    ->withQueryBuilder(
        $conn->createQueryBuilder()
            ->select("*")
            ->from('tbl_transaction')
            ->where($where)
    )
    ->withRequestParams($_GET);
return $datatables->getResponse();
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
