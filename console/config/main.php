<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'console\controllers',
    'modules' => [
        'user' => [
            'class' => 'common\modules\user\Module',
        ],
        'books' => [
            'class' => 'common\modules\books\Module',
        ],
    ],
    'components' => [
        'user' => [
            'class' => 'common\modules\user\models\User',
            'identityClass' => 'common\modules\user\models\User',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
    ],
    'params' => $params,
];
