<?php

namespace app\modules\monitoring\fuel\controllers;
use app\models\Fuel;
use Yii;
use yii\db\Query;
use app\components\Random;



class ApiController extends \yii\web\Controller
{

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

public function actionGet(){
Yii::$app->controller->enableCsrfValidation = false;
\Yii::$app->response->format=\Yii\web\Response::FORMAT_JSON;

/*$access=$_REQUEST['access'];*/

$query=new Query;
$query->select(['tbl_fuel.*','tbl_departement.departement_name','tbl_customers.Name','tbl_customers.Branch'])
->from('tbl_fuel')
->join('JOIN',
'tbl_departement','
tbl_departement.departement_id=tbl_fuel.departement_id')
->join('JOIN',
'tbl_customers','
tbl_customers.CustomerID=tbl_fuel.customer_id');

$command = $query->createCommand();
$data = $command->queryAll();
$json=['data'=>$data ];
return $json;
}



}
