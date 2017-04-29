<?php

namespace app\modules\user\controllers;
use app\models\UserLevel;
use yii\web\Controller;
use app\models\Branch;
use app\models\Customers;
use Yii;
use yii\helpers\Url;

/**
 * Default controller for the `user` module
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
      $level=UserLevel::find()->all();
      $branch=Branch::find()->all();
      $customers=Customers::find()->all();
        return $this->render('index',['level'=>$level,'branch'=>$branch,'customers'=>$customers]);
    }
}
