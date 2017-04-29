<?php

namespace app\modules\monitoring\fuel\controllers;
use app\storeprocedure\UsedOil;
use yii\helpers\Json;
use app\models\TbTransaction;
use kartik\mpdf\Pdf;
/*use app\plugins\fpdf181\FPDF;*/
use Yii;

use app\assets\AppAsset;
use app\assets\ChartAsset;


class ActionController extends \yii\web\Controller
{
    public function actionIndex()
    {
        /*return $this->render('index');*/
    }

    public function actionGetdata()
    {
       $data=UsedOil::getdata();
       $ar['data']=$data;
return Json::encode($ar);
    }

    public function actionReport($type,$labNumber){

      $data=TbTransaction::find()
      ->where(['LAB_NO'=>$labNumber])
      ->one();
      
      switch ($type) {
        case 'pdf':
      return $this->renderPartial('pdf4',['labNumber'=>$labNumber,'data'=>$data]);
      $htmlContent=$this->renderPartial('pdf4'/*,['labNumber'=>$labNumber,'data'=>$data]*/);
     $pdf = new Pdf([
        // set to use core fonts only
        /*'mode' => Pdf::MODE_UTF8, */
        // A4 paper format
        'format' => Pdf::FORMAT_A4, 
        // portrait orientation
        'orientation' => Pdf::ORIENT_PORTRAIT, 
        // stream to browser inline
        /*'destination' => Pdf::DEST_BROWSER,*/ 
        // your html content input
        'content' => $htmlContent,  
        // format content from your own css file if needed or use the
        // enhanced bootstrap css built by Krajee for mPDF formatting 
        'cssFile' =>'@vendor/main/pdf/pdf.css',
         // call mPDF methods on the fly
        'methods' => [ 
            /*'SetHeader'=>['Oil Analysis Report'],*/ 
            'SetFooter'=>['Page. {PAGENO}'],
        ]
    ]);
return $pdf->render();
          break;
          case 'excel':
         echo 'ini laporan excel, lab number : '.$labNumber;
          break;
        
        default:
          
          break;
      }

    }



}
