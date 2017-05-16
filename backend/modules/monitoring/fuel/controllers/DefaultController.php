<?php

namespace app\modules\monitoring\fuel\controllers;
use yii\web\Controller;
use app\storeprocedure\UsedOil;
use yii\helpers\Json;
use app\models\Customers;
use app\models\Departement;

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
    	       $customers=Customers::find()->all();
               $departement=Departement::find()->all();

        return $this->render('index',['customers'=>$customers,'departement'=>$departement]);
    }

    
}
