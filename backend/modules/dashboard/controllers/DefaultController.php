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

public function behaviors()
{
    return [
        'corsFilter' => [
            'class' => \yii\filters\Cors::className(),
            'cors' => [
                // restrict access to
                'Origin' => ['http://ut2017.dev:84', 'https://ut.petrolab.co.id'],
                'Access-Control-Request-Method' => ['POST', 'PUT'],
                // Allow only POST and PUT methods
                'Access-Control-Request-Headers' => ['X-Wsse'],
                // Allow only headers 'X-Wsse'
                'Access-Control-Allow-Credentials' => true,
                // Allow OPTIONS caching
                'Access-Control-Max-Age' => 3600,
                // Allow the X-Pagination-Current-Page header to be exposed to the browser.
                'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],
            ],

        ],
    ];
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
