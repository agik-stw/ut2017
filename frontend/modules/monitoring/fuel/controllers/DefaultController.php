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

    public static function allowedDomains()
{
    return [
        // '*',                        // star allows all domains
        'http://admin.ut2017.dev:84',
        
    ];
}

public function behaviors()
    {
        return array_merge(parent::behaviors(), [

            // For cross-domain AJAX request
            'corsFilter'  => [
                'class' => \yii\filters\Cors::className(),
                'cors'  => [
                    // restrict access to domains:
                    'Origin'                           => static::allowedDomains(),
                    'Access-Control-Request-Method'    => ['POST'],
                    'Access-Control-Allow-Credentials' => true,
                    'Access-Control-Max-Age'           => 3600,                 // Cache (seconds)

                ],
            ],

        ]);
    }

    public function actionIndex()
    {
    	       $tbTransaction=TbTransaction::find()
->limit(12)
       ->all();
        return $this->render('index',['tbTransaction'=>$tbTransaction]);
    }
}
