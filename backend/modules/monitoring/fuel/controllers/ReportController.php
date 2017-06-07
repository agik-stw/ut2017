<?php

namespace app\modules\monitoring\fuel\controllers;
use app\storeprocedure\UsedOil;
use yii\helpers\Json;
use app\models\TbTransaction;
use kartik\mpdf\Pdf;
/*use app\plugins\fpdf181\FPDF;*/
use Yii;
use app\models\Fuel;

use app\assets\AppAsset;
use app\assets\ChartAsset;
use yii\helpers\Url;


class ReportController extends \yii\web\Controller
{
/*public function beforeAction($action){
    $session=Yii::$app->session;
        if (!$session['username']) {
            return Yii::$app->getResponse()->redirect(Url::toRoute('/login'));
        }
        return parent::beforeAction($action);
}*/

 public function behaviors()
{
    return [
        'corsFilter' => [
            'class' => \yii\filters\Cors::className(),
            'cors' => [
                // restrict access to
                'Origin' => ['http://ut2017.dev:84', 'https://ut.petrolab.co.id'],
                'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'HEAD','LOAD'],
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

  public function actionView($reportid){
    $data=Fuel::find()
    ->where(['report_id'=>$reportid])->one();

          header("Content-type: application/pdf");
  header("Content-Disposition: inline; filename=".$data['file_upload']);

      return $this->renderPartial('view',['data'=>$data]);
  }

  public function actionOpenpdf(){

    $file=$_REQUEST['file'];
    $path="./uploads/fuel/";
     /*Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;*/
              // Set up PDF headers
             /* header('Content-type: application/pdf');
              header('Content-Disposition: inline; filename="' . $file . '"');
              header('Content-Transfer-Encoding: binary');
              header('Content-Length: ' . filesize("./uploads/fuel/$file"));
              header('Accept-Ranges: bytes');
              @readfile("./uploads/fuel/$file");*/
    return Yii::$app->response->sendFile($path.$file, $file, ['inline'=>true]);
  }

}
