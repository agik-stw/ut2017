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
$columns = array( 
	0 =>'lab_no', 
	1 => 'grouploc',
	2=> 'branch',
	3=> 'customer_name',
	4=> 'lab_no',
	5=> 'sample_date',
	6=> 'receive_date',
	7=> 'report_date',
	8=> 'unit_number',
	9=> 'component_name',
	10=> 'model',
	11=> 'lab_no',
	12=> 'oil_change',
	13=> 'eval_code'

);
	$data_id=$session->get('data_id');
	$data=UsedOil::getdata($data_id);
	$totalData=count($data);
	$totalFiltered=$totalData;


$json_data = array(
			/*"draw"            => 1, */
			"recordsTotal"    => intval( $totalData ),
			"recordsFiltered" => intval( $totalFiltered ),
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
