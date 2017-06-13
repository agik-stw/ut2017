<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);
use kartik\mpdf\Pdf;

return [
    'id' => 'app-frontend',
    'layout' => 'inspinia',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'assetManager' => [
            'linkAssets' => true,
        ],
        'backendDoor' => [
            'class' => 'yii\web\urlManager',
            'baseUrl' => 'http://admin.ut2017.dev:84/index.php/',//i.e. $_SERVER['DOCUMENT_ROOT'] .'/yiiapp/web/'
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
            'csrfParam' => '_csrf-frontend',
            /*'baseUrl'=>'',*/
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
            /*'class' => 'yii\web\Session',
            'timeout' => 657567576,*/
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
            /*'scriptUrl'=>'/index.php',*/
        ],
        'view' => [
            /*  'renderers' => [
                  'twig' => [
                      'class' => 'yii\twig\ViewRenderer',
                      // set cachePath to false in order to disable template caching
                      'cachePath' => false, //'@runtime/Twig/cache',
                      // Array of twig options:
                      'options' => [
                          'auto_reload' => true,
                      ],
                      // add Yii helpers or widgets here
                      'globals' => [
                          'html' => '\yii\helpers\Html',
                      ]
                  ]
              ]*/
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
        'login' => [
            'class' => 'app\modules\login\Module',
        ],
        'pdfjs' => [
            'class' => '\yii2assets\pdfjs\Module',
        ],
        'error' => [
            'class' => 'app\modules\error\Module',
        ],
        'proses' => [
            'class' => 'common\modules\transaction\Module',
        ],
    ],
    'params' => $params,
    'defaultRoute' => 'dashboard',
];
