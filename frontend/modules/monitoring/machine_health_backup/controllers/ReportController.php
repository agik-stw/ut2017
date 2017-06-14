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
}
