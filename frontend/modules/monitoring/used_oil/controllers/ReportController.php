<?php

namespace app\modules\monitoring\used_oil\controllers;
use Yii;
use app\access\UsedOilAccess;
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


//cetak ke excel
    public function actionExcel($date1,$date2,$by)
    {
        $session = Yii::$app->session;
      $dataId=$session->get('data_id');

if ($by=='receive_date') {
$data=UsedOilAccess::accessDataByReceiveDate($dataId,$date1,$date2);
}elseif($by=='report_date'){
	$data=UsedOilAccess::accessDataByReportDate($dataId,$date1,$date2);
}elseif($by=='sample_date'){
	$data=UsedOilAccess::accessDataBySampleDate($dataId,$date1,$date2);
}

/*\Yii::$app->response->format=\Yii\web\Response::FORMAT_JSON;
return $data;*/
/*return $this->renderPartial('excel',['data'=>$data]);*/

          $filename = 'report-'.$date1.'/'.'sd/'.$date2.'.xls';
          header("Content-type: application/vnd-ms-excel");
           header("Content-Disposition: attachment; filename=".$filename);
return $this->renderPartial('excel',['data'=>$data]);
    }

    //cetak ke excel
    public function actionCritical_item($date1,$date2,$by)
    {
        $session = Yii::$app->session;
      $dataId=$session->get('data_id');

return $this->renderPartial('export/exportxls');
    }


//cetak pdf
    public function actionPdf($labNumber){
    	Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        $connt=$this->renderPartial('report_process_others',['labNumber'=>$labNumber]);
return $connt;
    }


    //get data by lab number
    public function actionGetdata_by_labnumber($labNumber)
    {
    	\Yii::$app->response->format=\Yii\web\Response::FORMAT_JSON;
$connection = Yii::$app->db;
$command = $connection->createCommand('call usedOilby_labNumber("'.$labNumber.'")');
$data=$command->queryOne();
return $data;

    }

}
