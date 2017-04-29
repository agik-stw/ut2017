<?php
namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User2;
use app\models\UserLevel;
use yii\helpers\Url;


class AuthForm{

public static function validateUser($username,$password){
$session=Yii::$app->session;
$check=User2::find()
    ->where(['username' => $username,'level_id'=>1])
    ->one();

    if (!$check) {
    	 return Yii::$app->getResponse()->redirect('/login');
    }elseif($check){
    	$hash=$check->password;
$pass=Yii::$app->getSecurity()->validatePassword($password,$hash);
if ($pass) {
	$userlevel=UserLevel::find()
    ->where(['level_id' => $check->level_id])
    ->one();
    	Yii::$app->session['name'] = $check->nama;
    	Yii::$app->session['username'] = $check->nama;
    	Yii::$app->session['level_name'] = $userlevel->user_level;
    	Yii::$app->session['data_id'] = $check->data_id;
    	$session['captcha'] = [
    'number' => 5,
    'lifetime' => 1000,
];
    	return Yii::$app->getResponse()->redirect(Url::Base(''));
}else{
	return Yii::$app->getResponse()->redirect(Url::toRoute('/login'));
}
    
    	
    }
}


public function validPassword($password){

}

}