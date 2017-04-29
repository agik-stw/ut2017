<?php

namespace app\modules\api\controllers;
use app\storeprocedure\UsedOil;
use yii\helpers\Json;
use app\models\TbTransaction;
use app\models\Api;
use Yii;

class UsedoilController extends \yii\web\Controller
{
	public function actionGetdata($token){
		\Yii::$app->response->format=\Yii\web\Response::FORMAT_JSON;
		
		$session = Yii::$app->session;
		$tokencek=Api::find()
		->select(['token'])
      ->where(['token'=>$token])
      ->one();
if ($tokencek) {
	$requestData= $_REQUEST;
	$data_id=$session->get('data_id');
	$data=UsedOil::getdata($data_id);
	$totalData=count($data);
	$totalFiltered=$totalData;

       $ar['data']=$data;

$json_data = array(
			/*"draw"            => intval( $requestData['draw'] ), 
			"recordsTotal"    => intval( $totalData ),
			"recordsFiltered" => intval( $totalFiltered ),*/
			"data"            => $data
			);
return $json_data;
/*return Json::encode($json_data);*/
}else{
	$error=['message'=>'error token'];
	return Json::encode($error);
	}
}

}
