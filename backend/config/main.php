<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

$config = [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'defaultRoute' => 'books/catalog/index',
    'bootstrap' => [
        //'notifications',
        'log',
    ],
    'modules' => [
        /*'notifications' => [
            'class' => 'suver\notifications\Module',
            'dataViewWidget' => '\backend\widgets\DataView',
            'gridViewWidget' => '\backend\widgets\GridView',
        ],*/
        'user' => [
            'class' => 'backend\modules\user\Module',
        ],
        'books' => [
            'class' => 'common\modules\books\Module',
        ],
        'settings' => [
            'class' => 'backend\modules\settings\Module',
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
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
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                /*'<controller:[\w\-]+>' => '<controller>/index',
                '<controller:[\w\-]+>/<id:\d+>' => '<controller>/view',
                '<controller:[\w\-]+>/<action:[\w\-]+>' => '<controller>/<action>',
                '<module:[\w\-]+>' => '<module>/default/index',
                '<module:[\w\-]+>/<controller:[\w\-]+>/<id:\d+>' => '<module>/<controller>/view',
                '<module:[\w\-]+>/<controller:[\w\-]+>/<action:[\w\-]+>' => '<module>/<controller>/<action>',*/
            ],
        ],

    ],
    'params' => $params,
];


return $config;
