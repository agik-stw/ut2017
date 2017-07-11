<?php

namespace app\modules\monitoring\machine_health\controllers;
use yii\db\Query;
use Yii;


class ReportController extends \yii\web\Controller
{

//pdf
  public function actionPdf(){
  	/*\Yii::$app->response->format=\Yii\web\Response::FORMAT_JSON;*/

 $u = trim($_GET['u']);
  $m = trim($_GET['m']);
  $t = trim($_GET['t']);
  $e = trim($_GET['e']);
$query=new Query;

if ($e=='A') {
	 $query->select(['tx.Lab_No'])
  ->from('tbl_transaction tx')
  ->where(['tx.unit_id'=>$u])
  ->andWhere(['LIKE',"Trim(tx.MODEL)",$m])
  ->andWhere(['Date(tx.RECV_DT1)'=>$t]);
$data=(Object)$query->one();
}else{
 $query->select(['tx.Lab_No'])
  ->from('tbl_transaction tx')
  ->where(['tx.unit_id'=>$u])
  ->andWhere(['LIKE',"Trim(tx.MODEL)",$m])
  ->andWhere(['Date(tx.RECV_DT1)'=>$t])
  ->andWhere(['tx.EVAL_CODE'=>$e]);
$data=(Object)$query->one();
}

if (isset($data->Lab_No)) {
Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
$labNumber=$data->Lab_No;
$connt=$this->renderPartial('report_process',['labNumber'=>$labNumber]);
return $connt;
}else{
return "<h3>Data Tidak tersedia</h3>".'<a href="#" onclick="window.close();">Close</a>';
}

  }
}
