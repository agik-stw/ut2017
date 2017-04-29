<?php
namespace app\components;
use Yii;
class SessionCheck{
	public static function check($session){
		if (!isset($session)) {
			return Yii::$app->getResponse()->redirect('/login');
		}
	}
}