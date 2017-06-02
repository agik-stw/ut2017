<?php

namespace app\modules\monitoring\fuel\controllers;
use app\storeprocedure\UsedOil;
use yii\helpers\Json;
use app\models\TbTransaction;
use kartik\mpdf\Pdf;
/*use app\plugins\fpdf181\FPDF;*/
use Yii;
use app\models\Fuel;
use app\access\FuelAccess;


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
return ['data'=>FuelAccess::accessData($dataId)];
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
return ['data'=>FuelAccess::accessDataByReceiveDate($dataId,$date1,$date2)];
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
    return ['data'=>FuelAccess::accessDataBySampleDate($dataId,$date1,$date2)];
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
        return ['data'=>FuelAccess::accessDataByReportDate($dataId,$date1,$date2)];
            }



}
