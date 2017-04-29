<?php

namespace app\modules\monitoring\fuel\controllers;
use yii\web\Controller;
use app\storeprocedure\UsedOil;
use yii\helpers\Json;
use app\models\TbTransaction;

/**
 * Default controller for the `fuel` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
    	       $tbTransaction=TbTransaction::find()
->limit(12)
       ->all();
        return $this->render('index',['tbTransaction'=>$tbTransaction]);
    }
}
