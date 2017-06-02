<?php

namespace app\modules\monitoring\new_oil\controllers;
use app\storeprocedure\UsedOil;
use yii\helpers\Json;
use app\models\TbTransaction;
use kartik\mpdf\Pdf;
/*use app\plugins\fpdf181\FPDF;*/
use Yii;
use app\models\NewOil;

use app\assets\AppAsset;
use app\assets\ChartAsset;
use yii\helpers\Url;


class ReportController extends \yii\web\Controller
{
public function beforeAction($action){
    $session=Yii::$app->session;
        if (!$session['username']) {
            return Yii::$app->getResponse()->redirect(Url::toRoute('/login'));
        }
        return parent::beforeAction($action);
}

  public function actionView($reportid){
    $data=NewOil::find()
    ->where(['analysis_id'=>$reportid])->one();

          header("Content-type: application/pdf");
  header("Content-Disposition: inline; filename=".$data['file_upload']);

      return $this->renderPartial('view',['data'=>$data]);
  }

  public function actionOpenpdf(){

    $file=$_REQUEST['file'];
    $path="./uploads/new_oil/";
     Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
              // Set up PDF headers
              /*header('Content-type: application/pdf');
              header('Content-Disposition: inline; filename="' . '09003395-.pdf' . '"');
              header('Content-Transfer-Encoding: binary');
              header('Content-Length: ' . filesize('./09003395-.pdf'));
              header('Accept-Ranges: bytes');
              @readfile('./09003395-.pdf');*/
    return Yii::$app->response->sendFile($path.$file, $file, ['inline'=>true]);
  }

  
}
