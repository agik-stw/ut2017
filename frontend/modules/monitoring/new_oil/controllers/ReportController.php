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


class ReportController extends \yii\web\Controller
{
  public function actionView($reportid){
    $data=NewOil::find()
    ->where(['analysis_id'=>$reportid])->one();

          header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=".$data['file_upload']);

      return $this->renderPartial('view',['data'=>$data]);
  }
}
