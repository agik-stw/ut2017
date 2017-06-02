<?php

namespace app\modules\monitoring\new_oil\controllers;
use app\access\NewOilAccess;
use Yii;


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
return ['data'=>NewOilAccess::accessData($dataId)];
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
return ['data'=>NewOilAccess::accessDataByReceiveDate($dataId,$date1,$date2)];
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
    return ['data'=>NewOilAccess::accessDataBySampleDate($dataId,$date1,$date2)];
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
        return ['data'=>NewOilAccess::accessDataByReportDate($dataId,$date1,$date2)];
            }



}
