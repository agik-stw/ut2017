<?php

namespace app\modules\api\controllers;
use app\storeprocedure\New_oil;
use yii\helpers\Json;
use app\models\TbTransaction;
use app\models\Api;

class New_oilController extends \yii\web\Controller
{
	public function actionGetdata($token){
		$tokencek=Api::find()
		->select(['token'])
      ->where(['token'=>$token])
      ->one();
if ($tokencek) {
	$data=New_oil::getdata();
       $ar['data']=$data;
return Json::encode($ar);
}else{
	$error=['message'=>'error token'];
	return Json::encode($error);
	}
}

}
