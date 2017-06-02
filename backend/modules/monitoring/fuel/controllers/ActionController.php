<?php

namespace app\modules\monitoring\fuel\controllers;
use app\models\Fuel;
use Yii;
use yii\db\Query;
use app\components\Random;
use yii\helpers\Url;

class ActionController extends \yii\web\Controller
{

public function beforeAction($action){
    $session=Yii::$app->session;
        if (!$session['username']) {
            return Yii::$app->getResponse()->redirect(Url::toRoute('/login'));
        }
        return parent::beforeAction($action);
}

  public function behaviors()
 {
     return [
         'corsFilter' => [
             'class' => \yii\filters\Cors::className(),
             'cors' => [
                 // restrict access to
                 'Origin' => ['http://ut2017.dev:84', 'https://ut.petrolab.co.id'],
                 'Access-Control-Request-Method' => ['POST', 'PUT'],
                 // Allow only POST and PUT methods
                 'Access-Control-Request-Headers' => ['X-Wsse'],
                 // Allow only headers 'X-Wsse'
                 'Access-Control-Allow-Credentials' => true,
                 // Allow OPTIONS caching
                 'Access-Control-Max-Age' => 3600,
                 // Allow the X-Pagination-Current-Page header to be exposed to the browser.
                 'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],
             ],

         ],
     ];
 }

    public function actionGet(){
Yii::$app->controller->enableCsrfValidation = false;
\Yii::$app->response->format=\Yii\web\Response::FORMAT_JSON;

/*$access=$_REQUEST['access'];*/

$query=new Query;
$query->select(['tbl_fuel.*','tbl_departement.departement_name','tbl_customers.Name','tbl_customers.Branch'])
->from('tbl_fuel')
->join('JOIN',
'tbl_departement','
tbl_departement.departement_id=tbl_fuel.departement_id')
->join('JOIN',
'tbl_customers','
tbl_customers.CustomerID=tbl_fuel.customer_id');
return ['data'=>$query->all()];
}

//get data by reveive date
  public function actionGetdata_by_receive_date($date1,$date2)
    {
        \Yii::$app->response->format=\Yii\web\Response::FORMAT_JSON;
        $query=new Query;
     
        $query->select(['tbl_fuel.*','tbl_departement.departement_name','tbl_customers.Name','tbl_customers.Branch'])
  ->from('tbl_fuel')
  ->join('JOIN',
  'tbl_departement','
  tbl_departement.departement_id=tbl_fuel.departement_id')
  ->join('JOIN',
  'tbl_customers','
  tbl_customers.CustomerID=tbl_fuel.customer_id')
  ->where(['between','tbl_fuel.receive_date',$date1,$date2]);
return ['data'=>$query->all()];

    }

    //get data by report date
  public function actionGetdata_by_report_date($date1,$date2)
    {
        \Yii::$app->response->format=\Yii\web\Response::FORMAT_JSON;
        $query=new Query;
     
        $query->select(['tbl_fuel.*','tbl_departement.departement_name','tbl_customers.Name','tbl_customers.Branch'])
  ->from('tbl_fuel')
  ->join('JOIN',
  'tbl_departement','
  tbl_departement.departement_id=tbl_fuel.departement_id')
  ->join('JOIN',
  'tbl_customers','
  tbl_customers.CustomerID=tbl_fuel.customer_id')
  ->where(['between','tbl_fuel.report_date',$date1,$date2]);
return ['data'=>$query->all()];

    }


        //get data by report date
  public function actionGetdata_by_sample_date($date1,$date2)
    {
        \Yii::$app->response->format=\Yii\web\Response::FORMAT_JSON;
        $query=new Query;
     
        $query->select(['tbl_fuel.*','tbl_departement.departement_name','tbl_customers.Name','tbl_customers.Branch'])
  ->from('tbl_fuel')
  ->join('JOIN',
  'tbl_departement','
  tbl_departement.departement_id=tbl_fuel.departement_id')
  ->join('JOIN',
  'tbl_customers','
  tbl_customers.CustomerID=tbl_fuel.customer_id')
  ->where(['between','tbl_fuel.sample_date',$date1,$date2]);
return ['data'=>$query->all()];

    }


//get data by reportid
public function actionBy_report_id($reportId){
    Yii::$app->controller->enableCsrfValidation = false;
\Yii::$app->response->format=\Yii\web\Response::FORMAT_JSON;

$query=new Query;
$query->select(['tbl_fuel.*','tbl_departement.departement_name','tbl_customers.Name','tbl_customers.Branch'])
->from('tbl_fuel')
->join('JOIN',
'tbl_departement','
tbl_departement.departement_id=tbl_fuel.departement_id')
->join('JOIN',
'tbl_customers','
tbl_customers.CustomerID=tbl_fuel.customer_id')
->where(['tbl_fuel.report_id'=>$reportId]);
return $query->one();
}

    public function actionAdd(){
      /*disable csrf validasi*/
      Yii::$app->controller->enableCsrfValidation = false;
      /*jadikan return value ke json*/
    \Yii::$app->response->format=\Yii\web\Response::FORMAT_JSON;
    $fuel=new Fuel;

    /*data dari request view*/
    $report_id=Yii::$app->request->post('report_id');
    $report_date=Yii::$app->request->post('report_date');
    $receive_date=Yii::$app->request->post('receive_date');
    $sample_date=Yii::$app->request->post('sample_date');
    $group=Yii::$app->request->post('group');
    $customer_name=Yii::$app->request->post('customer_name');
    $departement=Yii::$app->request->post('departement');
    $lab_number=Yii::$app->request->post('lab_number');
    $job_number=Yii::$app->request->post('job_number');
    $detail_of_sample=Yii::$app->request->post('detail_of_sample');
    $target_lead_time=Yii::$app->request->post('target_lead_time');
    $actual_lead_time=Yii::$app->request->post('actual_lead_time');
    $alert=Yii::$app->request->post('alert');
    $fileName='file_upload';
    $uploadPath = './uploads';


    /*jika ada request file dengan nama file_upload*/

    if (isset($_FILES[$fileName])) {
    $pdfname='rpt_fuel_'.'id_'.$report_id.'_'.Random::randName().'.pdf';
    $fuel->report_id=$report_id;
    $fuel->report_date=$report_date;
    $fuel->receive_date=$receive_date;
    $fuel->sample_date=$sample_date;
    $fuel->group=$group;
    $fuel->customer_id=$customer_name;
    $fuel->departement_id=$departement;
    $fuel->lab_number=$lab_number;
    $fuel->Job_number=$job_number;
    $fuel->detail_of_sample=$detail_of_sample;
    $fuel->target_lead_time=$target_lead_time;
    $fuel->actual_lead_time=$actual_lead_time;
    $fuel->Alert=$alert;
    $fuel->file_upload=$pdfname;
    $savedata=$fuel->save();

            $file = \yii\web\UploadedFile::getInstanceByName($fileName);
    $savefile=$file->saveAs($uploadPath . '/fuel'.'/'.$pdfname);
            if ($savedata && $savefile) {
               return ['responses'=>'Saved','message'=>'Data is saved','status'=>'success'];
            }else{
              return ['responses'=>'Saved','message'=>'Data is saved','status'=>'error'];
            }

    }
    }

     public function actionEdit(){
      /*disable csrf validasi*/
      /*Yii::$app->controller->enableCsrfValidation = false;*/
      /*jadikan return value ke json*/
    \Yii::$app->response->format=\Yii\web\Response::FORMAT_JSON;
    

    /*data dari request view*/
    $report_id=$_REQUEST['report_id'];
    $report_date=$_REQUEST['report_date'];
    $receive_date=$_REQUEST['receive_date'];
    $sample_date=$_REQUEST['sample_date'];
    $group=$_REQUEST['group'];
    $customer_name=$_REQUEST['customer_name'];
    $departement=$_REQUEST['departement'];
    $lab_number=$_REQUEST['lab_number'];
    $job_number=$_REQUEST['job_number'];
    $detail_of_sample=$_REQUEST['detail_of_sample'];
    $target_lead_time=$_REQUEST['target_lead_time'];
    $actual_lead_time=$_REQUEST['actual_lead_time'];
    $alert=$_REQUEST['alert'];
    $fileName='file_upload';
    $uploadPath = './uploads/fuel';

    $fuel=Fuel::find()->where(['report_id'=>$report_id])->one();

/*return ['responses'=>'Saved','message'=>$fuel,'status'=>'error'];*/

    /*jika ada request file dengan nama file_upload*/

    if (isset($_FILES[$fileName]) && $_FILES[$fileName]["name"]==="") {

    $pdfname='rpt_fuel_'.'id_'.$report_id.'_'.Random::randName().'.pdf';
    $fuel->report_id=$report_id;
    $fuel->report_date=$report_date;
    $fuel->receive_date=$receive_date;
    $fuel->sample_date=$sample_date;
    $fuel->group=$group;
    $fuel->customer_id=$customer_name;
    $fuel->departement_id=$departement;
    $fuel->lab_number=$lab_number;
    $fuel->Job_number=$job_number;
    $fuel->detail_of_sample=$detail_of_sample;
    $fuel->target_lead_time=$target_lead_time;
    $fuel->actual_lead_time=$actual_lead_time;
    $fuel->Alert=$alert;
    /*$fuel->file_upload=$pdfname;*/
    $savedata=$fuel->update();

            /*$file = \yii\web\UploadedFile::getInstanceByName($fileName);
    $savefile=$file->saveAs($uploadPath . '/fuel'.'/'.$pdfname);*/
            if ($savedata) {
               return ['responses'=>'Saved','message'=>'Data is saved','status'=>'success'];
            }else{
              return ['responses'=>'Saved','message'=>'Data is saved','status'=>'error'];
            }

    }elseif(isset($_FILES[$fileName]) && $_FILES[$fileName]["name"]!==""){

$pdfname='rpt_fuel_'.'id_'.$report_id.'_'.Random::randName().'.pdf';
    /*$fuel->report_id=$report_id;*/
    $fuel->report_date=$report_date;
    $fuel->receive_date=$receive_date;
    $fuel->sample_date=$sample_date;
    $fuel->group=$group;
    $fuel->customer_id=$customer_name;
    $fuel->departement_id=$departement;
    $fuel->lab_number=$lab_number;
    $fuel->Job_number=$job_number;
    $fuel->detail_of_sample=$detail_of_sample;
    $fuel->target_lead_time=$target_lead_time;
    $fuel->actual_lead_time=$actual_lead_time;
    $fuel->Alert=$alert;
    $fuel->file_upload=$pdfname;
    /*$savedata=$fuel->update();*/

$model=Fuel::find()->where(['report_id'=>$report_id])->one();
$fileUpload=$model->file_upload;
    if (unlink($uploadPath.'/'.$fileUpload) && $fuel->update()) {
        $file = \yii\web\UploadedFile::getInstanceByName($fileName);
    $savefile=$file->saveAs($uploadPath.'/'.$pdfname);
        return ['responses'=>'Saved','message'=>'Data is saved','status'=>'success'];
    }else{
        
        return ['responses'=>'Saved','message'=>'Data not saved','status'=>'success'];
    }

    /*if ($savedata) {
               return ['responses'=>'Saved','message'=>'Data is saved','status'=>'success'];
            }else{
              return ['responses'=>'Saved','message'=>'Data not saved','status'=>'error'];
            }*/
    }
    }


}
