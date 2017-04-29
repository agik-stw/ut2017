<?php

namespace app\modules\dashboard\controllers;

use yii\web\Controller;
use app\components\SessionCheck;
use Yii;
use yii\helpers\Url;

/**
 * Default controller for the `dashboard` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
    	$session=Yii::$app->session;
    	if (!$session['username']) {
    		return Yii::$app->getResponse()->redirect(Url::toRoute('/login'));
    	}
        return $this->render('index');
    }
}
