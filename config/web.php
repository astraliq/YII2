<?php

$params = require __DIR__ . '/params.php';
$db = file_exists(__DIR__.'/db_local.php') ? (require __DIR__ . '/db_local.php') : (require __DIR__ . '/db.php');


$config = [
    'id' => 'basic',
    'name' => 'MyTask',
    'basePath' => dirname(__DIR__),
    'language' => 'ru_RU',
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@filesWeb'=>'/files/',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'KgwG1UaM5LY7H1NDdhY40tia3ldE7KwL',
            'parsers' => [
                'application/json' => \yii\web\JsonParser::class,
            ]
        ],
        'dao' => ['class' => \app\components\DAOComponent::class],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'auth' => ['class' => \app\components\AuthComponent::class],
        'activity' => ['class' => \app\components\ActivityComponent::class],
        'authManager' => [
            'class' => 'yii\rbac\DbManager'
        ],
        'rbac' => ['class' => \app\components\RbacComponent::class],
        'user' => [
            'identityClass' => 'app\models\Users',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => $db,
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
//                'create'=>'activity/create',
//                'new'=>'activity/create',
//                'GET event/view/<id:\d+>'=>'activity/view',
//                'GET event/view/<id:\w+>'=>'activity/view',
//                'event/<action>'=>'activity/<action>',
                [
                    'class'=>yii\rest\UrlRule::class,
                    'controller'=>'user-rest-api',
                    'pluralize'=>false
                ],
            ],
        ],
        
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['*'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['*'],
    ];
}

return $config;
