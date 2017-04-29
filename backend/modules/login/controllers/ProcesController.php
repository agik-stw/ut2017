<?php

namespace app\modules\login\controllers;
use Yii;
use app\models\loginForm;
use app\models\AuthForm;
use yii\helpers\Url;

class ProcesController extends \yii\web\Controller
{

	public function beforeAction($action) {
    $this->enableCsrfValidation = false;
    return parent::beforeAction($action);
}

    public function actionAuth(){
$request = Yii::$app->request;
$username=$request->post('username');
$password=$request->post('password');
$hash = Yii::$app->getSecurity()->generatePasswordHash($password);
/*return $hash;*/
    	return AuthForm::validateUser($username,$password);
    	// return $this->redirect('/login');
    }

    public function actionLogout(){
    	$session=Yii::$app->session;
    	$session->remove('username');
    	$session->remove('name');
    	return Yii::$app->getResponse()->redirect(Url::toRoute('/login'));
    }

}
