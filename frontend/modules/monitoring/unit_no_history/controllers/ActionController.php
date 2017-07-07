<?php

namespace app\modules\monitoring\unit_no_history\controllers;
use app\models\unit_no_history\Unit_no_history;
use Yii;
use yii\db\Query;
use app\components\Random;
use yii\helpers\Url;
use db2\config\Configdb;
//doctrine lib
use Doctrine\DataTables;

class ActionController extends \yii\web\Controller
{

public function beforeAction($action){
    $session=Yii::$app->session;
        if (!$session['username']) {
            return Yii::$app->getResponse()->redirect(Url::toRoute('/login'));
        }
        return parent::beforeAction($action);
}

    public function actionGet(){
$model=new Unit_no_history;
return $model->get_data();

}




}
