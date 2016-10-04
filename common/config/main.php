<?php
$config = [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
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
            'identityClass' => 'common\modules\user\models\User',
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
            'enableAutoLogin' => true,
            // 'loginUrl' => ['user/login'],
            // ...
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'i18n' => [
            'translations' => [
                'common*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'sourceLanguage' => 'ru-RU',
                    'fileMap' => [
                        'common'       => 'common.php',
                        'common/error' => 'common.error.php',
                    ],
                ],
                'backend*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@backend/messages',
                    'sourceLanguage' => 'ru-RU',
                    'fileMap' => [
                        'backend'       => 'backend.php',
                        'backend/error' => 'backend.error.php',
                    ],
                ],
                'frontend*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@frontend/messages',
                    'sourceLanguage' => 'ru-RU',
                    'fileMap' => [
                        'frontend'       => 'frontend.php',
                        'frontend/error' => 'frontend.error.php',
                    ],
                ],
            ],
        ],
    ],
];

return $config;
