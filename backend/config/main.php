<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);
use kartik\mpdf\Pdf;

return [
  'layout'=>'inspinia',
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
      'assetManager' => [
            'linkAssets' => true,
 ],

     'urlManagerFrontend' => [
                'class' => 'yii\web\urlManager',
                'baseUrl' => 'http://ut2017.dev:84/',//i.e. $_SERVER['DOCUMENT_ROOT'] .'/yiiapp/web/'
                'enablePrettyUrl' => true,
                'showScriptName' => false,
        ],
      'pdf' => [
       'class' => Pdf::classname(),
       'format' => Pdf::FORMAT_A4,
       'orientation' => Pdf::ORIENT_PORTRAIT,
       'destination' => Pdf::DEST_BROWSER,
       // refer settings section for all configuration options
   ],
        'request' => [
        /*'baseUrl'=>'/backend',*/
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'error/type/404',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => true,
            'rules' => [
            ],
            /*'scriptUrl'=>'/backend/index.php',*/
        ],

    ],
    'modules' => [
          'dashboard' => [
            'class' => 'app\modules\dashboard\Module',
        ],
        'monitoring' => [
            'class' => 'app\modules\monitoring\Module',
        ],
'fuel' => [
            'class' => 'app\modules\monitoring\fuel\Module',
        ],
        'used_oil' => [
            'class' => 'app\modules\monitoring\used_oil\Module',
        ],
        'api' => [
            'class' => 'app\modules\api\Module',
        ],
        'user' => [

            'class' => 'app\modules\user\Module',

        ],
        'login' => [
            'class' => 'app\modules\login\Module',
        ],
        'pdfjs' => [
       'class' => '\yii2assets\pdfjs\Module',
   ],
   'error' => [
       'class' => 'app\modules\error\Module',
   ],
   'utility' => [

            'class' => 'app\modules\utility\Module',

        ],
   ],
 
    'params' => $params,
    'defaultRoute' => 'dashboard',
];
