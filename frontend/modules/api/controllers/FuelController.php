<?php

namespace app\modules\api\controllers;
use app\storeprocedure\Fuel;
use yii\helpers\Json;
use app\models\TbTransaction;
use app\models\Api;
use Yii;

class FuelController extends \yii\web\Controller
{
   public function actionGetdata($token){
   	$session = Yii::$app->session;
		$tokencek=Api::find()
		->select(['token'])
      ->where(['token'=>$token])
      ->one();
if ($tokencek) {
	$data_id=$session->get('data_id');
	$data=Fuel::getdata($data_id);
       $ar['data']=$data;
return Json::encode($ar);
}else{
	$error=['message'=>'error token'];
	return Json::encode($error);
	}
}

}
