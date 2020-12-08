<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'LGiDhX8aB4I5MgZXYFgOnWUiNQavNoVP',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            //'enableAutoLogin' => true,
            'enableSession' => false,
            'loginUrl' => null,
            //'authTimeout' => 60*30,
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
	    'defaultRoles' => ['guest','admin'],
            // uncomment if you want to cache RBAC items hierarchy
            // 'cache' => 'cache',
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
		/*
        'mailer' => [
        'class' => 'yii\swiftmailer\Mailer',
        'viewPath' => '@app/mailer',
        'useFileTransport' => false,
        'transport' => [
            'class' => 'Swift_SmtpTransport',
            'host' => 'smtp.gmail.com',
            'username' => 'hrfivehnamte@gmail.com',
            'password' => 'Hruaia@1993',
            'port' => '587',
            'encryption' => 'tls',
                        ],
		],
		*/
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
            //'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
				['class' => 'yii\rest\UrlRule', 'controller' => 'user'],
            ],
        ],
         'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'Pq15Mcn0nqihoxCLAqGSz-egc7SOOVW',
            'parsers' => [
               'application/json' => 'yii\web\JsonParser',
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
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
