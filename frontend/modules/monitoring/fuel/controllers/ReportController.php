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


class ReportController extends \yii\web\Controller
{
  public function actionView($reportid){
    $data=Fuel::find()
    ->where(['report_id'=>$reportid])->one();

          header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=".$data['file_upload']);

      return $this->renderPartial('view',['data'=>$data]);
  }


            public function actionTestpdf(){
              /*Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;*/
              // Set up PDF headers
              /*header('Content-type: application/pdf');
              header('Content-Disposition: inline; filename="' . '09003395-.pdf' . '"');
              header('Content-Transfer-Encoding: binary');
              header('Content-Length: ' . filesize('./09003395-.pdf'));
              header('Accept-Ranges: bytes');
              @readfile('./09003395-.pdf');*/

              return Yii::$app->response->sendFile('./09003395-.pdf', '09003395-.pdf', ['inline'=>true]);
            }
}
