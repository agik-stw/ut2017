<?php

namespace app\modules\monitoring\new_oil\controllers;

use yii\web\Controller;
use app\models\Customers;
use app\models\Departement;
use Yii;
use yii\helpers\Url;

/**
 * Default controller for the `new_oil` module
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
       $customers=Customers::find()->all();
               $departement=Departement::find()->all();

        return $this->render('index',['customers'=>$customers,'departement'=>$departement]);
    }
}
