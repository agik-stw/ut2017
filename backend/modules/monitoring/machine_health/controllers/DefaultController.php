<?php

namespace app\modules\monitoring\machine_health\controllers;

use yii\web\Controller;
use Yii;
use yii\helpers\Url;

/**
 * Default controller for the `machine_health` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function beforeAction($action){
    $session=Yii::$app->session;
        if (!$session['username']) {
            return Yii::$app->getResponse()->redirect(Url::toRoute('/login'));
        }
        return parent::beforeAction($action);
}

    public function actionIndex()
    {
        return $this->render('index');
    }
}
