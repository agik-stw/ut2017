<?php

namespace app\modules\monitoring\used_oil\controllers;

use yii\web\Controller;
use Yii;
use yii\helpers\Url;
/**
 * Default controller for the `used_oil` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    	public function beforeAction($action) {
    		$session = Yii::$app->session;
    if (!$session->get('username')) {
    	return 'aaaaaaaaa';
    }
    return parent::beforeAction($action);
}

    public function actionIndex()
    {
        $session=Yii::$app->session;
        if (!$session['username']) {
            return Yii::$app->getResponse()->redirect(Url::toRoute('/login'));
        }
        return $this->render('index');
    }
}
