<?php

namespace app\modules\monitoring\new_oil\controllers;
use app\models\NewOil;
use Yii;
use yii\db\Query;
use app\components\Random;
use yii\helpers\Url;
use db2\config\Configdb;
//doctrine lib
use Doctrine\DataTables;

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
\Yii::$app->response->format=\Yii\web\Response::FORMAT_JSON;
    $conn=Configdb::connections();
    $sql="tx.*,cus.Name,cus.Branch";
$where="tx.analysis_date > (DATE_SUB(CURDATE(), INTERVAL 3 YEAR))";

$datatables = (new DataTables\Builder())
    ->withQueryBuilder(
        $conn->createQueryBuilder()
            ->select($sql)
            ->from('tbl_new_oil','tx')
            ->join('tx','tbl_customers','cus','tx.customer_id=cus.CustomerID')
            ->where($where)
    )
    ->withRequestParams($_REQUEST);
return $datatables->getResponse();
}

//get data by reportid
public function actionBy_report_id($id){
    Yii::$app->controller->enableCsrfValidation = false;
\Yii::$app->response->format=\Yii\web\Response::FORMAT_JSON;

$query=new Query;
$query->select(['tbl_new_oil.*','tbl_customers.Name','tbl_customers.Branch'])
->from('tbl_new_oil')
->join('JOIN',
'tbl_customers','
tbl_customers.CustomerID=tbl_new_oil.customer_id')
->where(['tbl_new_oil.analysis_id'=>$id]);
return $query->one();
}

    public function actionAdd(){
      /*disable csrf validasi*/
      Yii::$app->controller->enableCsrfValidation = false;
      /*jadikan return value ke json*/
    \Yii::$app->response->format=\Yii\web\Response::FORMAT_JSON;
    $model=new NewOil;

    /*data dari request view*/
    $analysis_id=Yii::$app->request->post('analysis_id');
    $analysis_date=Yii::$app->request->post('analysis_date');
    $receive_date=Yii::$app->request->post('receive_date');
    $sample_date=Yii::$app->request->post('sample_date');
    $group=Yii::$app->request->post('group');
    $customer_name=Yii::$app->request->post('customer_name');
    $lab_number=Yii::$app->request->post('lab_number');
    $sample_name=Yii::$app->request->post('sample_name');
    $running_hours_of_oil=Yii::$app->request->post('running_hours_of_oil');
    $running_hours=Yii::$app->request->post('running_hours');
    $engine_builder=Yii::$app->request->post('engine_builder');
     $engine_model=Yii::$app->request->post('engine_model');
      $serial_number=Yii::$app->request->post('serial_number');
       $engine_location=Yii::$app->request->post('engine_location');
    $fileName='file_upload';
    $uploadPath = './uploads/new_oil/';


    /*jika ada request file dengan nama file_upload*/

    if (isset($_FILES[$fileName])) {
    $pdfname='rpt_newOil_'.'id_'.$analysis_id.'_'.Random::randName().'.pdf';
    $model->analysis_id=$analysis_id;
    $model->analysis_date=$analysis_date;
    $model->receive_date=$receive_date;
    $model->sample_date=$sample_date;
    $model->group=$group;
    $model->customer_id=$customer_name;
    $model->lab_number=$lab_number;
    $model->sample_name=$sample_name;
    $model->running_hours_of_oil=$running_hours_of_oil;
    $model->running_hours=$running_hours;
    $model->engine_builder=$engine_builder;
    $model->engine_model=$engine_model;
    $model->serial_number=$serial_number;
    $model->engine_location=$engine_location;
    $model->file_upload=$pdfname;
    /*$savedata=$model->save();*/

            $file = \yii\web\UploadedFile::getInstanceByName($fileName);
    /*$savefile=$file->saveAs($uploadPath.$pdfname);*/
            if ($model->save() && $file->saveAs($uploadPath.$pdfname)) {
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
    $analysis_id=Yii::$app->request->post('analysis_id');
    $analysis_date=Yii::$app->request->post('analysis_date');
    $receive_date=Yii::$app->request->post('receive_date');
    $sample_date=Yii::$app->request->post('sample_date');
    $group=Yii::$app->request->post('group');
    $customer_name=Yii::$app->request->post('customer_name');
    $lab_number=Yii::$app->request->post('lab_number');
    $sample_name=Yii::$app->request->post('sample_name');
    $running_hours_of_oil=Yii::$app->request->post('running_hours_of_oil');
    $running_hours=Yii::$app->request->post('running_hours');
    $engine_builder=Yii::$app->request->post('engine_builder');
     $engine_model=Yii::$app->request->post('engine_model');
      $serial_number=Yii::$app->request->post('serial_number');
       $engine_location=Yii::$app->request->post('engine_location');
    $fileName='file_upload';
    $uploadPath = './uploads/new_oil/';

    $model=NewOil::find()->where(['analysis_id'=>$analysis_id])->one();



    /*jika ada request file dengan nama file_upload*/

    if (isset($_FILES[$fileName]) && $_FILES[$fileName]["name"]==="") {
/*return ['responses'=>'Saved','message'=>$group,'status'=>'error'];*/
    $pdfname='rpt_fuel_'.'id_'.$analysis_id.'_'.Random::randName().'.pdf';
    $model->analysis_id=$analysis_id;
    $model->analysis_date=$analysis_date;
    $model->receive_date=$receive_date;
    $model->sample_date=$sample_date;
    $model->group=$group;
    $model->customer_id=$customer_name;
    $model->lab_number=$lab_number;
    $model->sample_name=$sample_name;
    $model->running_hours_of_oil=$running_hours_of_oil;
    $model->running_hours=$running_hours;
    $model->engine_builder=$engine_builder;
    $model->engine_model=$engine_model;
    $model->serial_number=$serial_number;
    $model->engine_location=$engine_location;
    /*$model->file_upload=$pdfname;*/

            /*$file = \yii\web\UploadedFile::getInstanceByName($fileName);
    $savefile=$file->saveAs($uploadPath . '/fuel'.'/'.$pdfname);*/
            if ($model->update()) {
               return ['responses'=>'Saved','message'=>'Data is saved','status'=>'success'];
            }else{
              return ['responses'=>'Saved','message'=>'Data is saved','status'=>'error'];
            }

    }elseif(isset($_FILES[$fileName]) && $_FILES[$fileName]["name"]!==""){

    $pdfname='rpt_newOil_'.'id_'.$analysis_id.'_'.Random::randName().'.pdf';
    $model->analysis_id=$analysis_id;
    $model->analysis_date=$analysis_date;
    $model->receive_date=$receive_date;
    $model->sample_date=$sample_date;
    $model->group=$group;
    $model->customer_id=$customer_name;
    $model->lab_number=$lab_number;
    $model->sample_name=$sample_name;
    $model->running_hours_of_oil=$running_hours_of_oil;
    $model->running_hours=$running_hours;
    $model->engine_builder=$engine_builder;
    $model->engine_model=$engine_model;
    $model->serial_number=$serial_number;
    $model->engine_location=$engine_location;
   $model->file_upload=$pdfname;
    /*$savedata=$model->update();*/

$newOil=NewOil::find()->where(['analysis_id'=>$analysis_id])->one();
$fileUpload=$newOil->file_upload;
    if (unlink($uploadPath.$fileUpload) && $model->update()) {
        $file = \yii\web\UploadedFile::getInstanceByName($fileName);
    $savefile=$file->saveAs($uploadPath.$pdfname);
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

//delete
    public function actionDelete(){
      
    /*disable csrf validasi*/
  Yii::$app->controller->enableCsrfValidation = false;
  /*jadikan return value ke json*/
\Yii::$app->response->format=\Yii\web\Response::FORMAT_JSON;

$analysis_id=$_REQUEST['analysis_id'];
$uploadPath = './uploads/new_oil/';

$model=NewOil::find()->where(['analysis_id'=>$analysis_id])->one();
$fileUpload=$model->file_upload;

  if (unlink($uploadPath.$fileUpload) && NewOil::deleteAll('analysis_id = :analysis_id ', [':analysis_id'=>$analysis_id])) {
        return ['responses'=>'Deleted!','message'=>'Your data has been deleted','status'=>'success'];
      }else{
        return ['responses'=>'Error!','message'=>'Your data Not deleted','status'=>'error'];
      }
}


}
