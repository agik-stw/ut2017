<?php

namespace app\modules\monitoring\machine_health\controllers;
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

//pdf
  public function actionPdf(){
    return 'report pdf';
  }
}
