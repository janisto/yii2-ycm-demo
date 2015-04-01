<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'yii2-ycm-demo',
    'name' => 'YCM Demo',
    //'version' => '1.0.0',
    //'language' => 'fi',
    //'timeZone' => 'Europe/Helsinki',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'BbdbsUM_47VHTMkYcpV4C9h8WnlcZ1ur',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
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
                    'logVars' => [],
                ],
            ],
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'session' => [
            'class' => 'yii\web\DbSession',
            'db' => 'db',
            'sessionTable' => '{{%session}}',
        ],
        'db' => require(__DIR__ . '/db.php'),
    ],
    'aliases' => [
        '@uploadPath' => '@app/web/uploads', // @webroot isn't available yet (@webroot/uploads).
        '@uploadUrl' => rtrim(dirname($_SERVER["SCRIPT_NAME"]), '/') . '/uploads', // @web isn't available yet (@web/uploads).
    ],
    'modules' => [
        'ycm' => [
            'class' => 'janisto\ycm\Module',
            'admins' => ['admin'],
            'urlPrefix' => 'admin',
            'registerModels' => [
                /**
                 * Usage:
                 * 'name' => 'class definition'
                 *
                 * name:
                 * It's used as a url slug and by default the folder name for uploads. You can override the upload
                 * folder name in class configuration array: 'folderName' => 'xxx'
                 *
                 * class-definition:
                 * - a string: representing the class name of the object to be created
                 * - a configuration array: the array must contain a `class` element which is treated as the object class,
                 *   and the rest of the name-value pairs will be used to initialize the corresponding object properties
                 * - a PHP callable: either an anonymous function or an array representing a class method (`[$class or $object, $method]`).
                 *   The callable should return a new instance of the object being created.
                 */
                'basic' => 'app\models\Basic',
                'basic2' => [
                    'class' => 'app\models\BasicSearch',
                    'folderName' => 'basic', // use the same path for uploads
                ],
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    //$config['bootstrap'][] = 'debug';
    //$config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
