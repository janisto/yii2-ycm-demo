<?php

$params = require(__DIR__ . '/params.php');

$webroot = dirname(__DIR__) . '/web';
$web = rtrim(dirname($_SERVER["SCRIPT_NAME"]), '/');

$config = [
    'id' => 'yii2-ycm-demo',
    'name' => 'YCM Demo',
    //'version' => '1.0.0',
    //'language' => 'fi',
    'timeZone' => 'Europe/Helsinki',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],

    // Components
    'components' => [
        'formatter' => [
            //'defaultTimeZone' => 'Europe/Helsinki',
        ],
        'assetManager' => [
            //'appendTimestamp' => true,
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'BbdbsUM_47VHTMkYcpV4C9h8WnlcZ1ur',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'identityCookie' => ['name' => '_identity', 'path' => $web . '/'],
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
            'rules' => [
                '' => 'site/index',

                'common/index'=>'common/index',
                'common/<slug:[a-zA-Z0-9-]+>'=>'common/view',

                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
        ],
        'session' => [
            'class' => 'yii\web\DbSession',
            'db' => 'db',
            'sessionTable' => '{{%session}}',
        ],
        'db' => require(__DIR__ . '/db.php'),
    ],

    // Path aliases
    'aliases' => [
        '@uploadPath' => $webroot . '/uploads', // @webroot isn't available yet (@webroot/uploads).
        '@uploadUrl' => $web . '/uploads', // @web isn't available yet (@web/uploads).
    ],

    // Modules
    'modules' => [
        'ycm' => [
            'class' => 'janisto\ycm\Module',
            'admins' => ['admin'], // admin usernames array
            'urlPrefix' => 'admin', // url for ycm
            'registerModels' => [
                /**
                 * Add models.
                 *
                 * Usage:
                 * [
                 *   'name' => 'class definition',
                 * ]
                 *
                 * name:
                 * It's used as a url slug and by default the folder name for uploads. You can override the upload
                 * folder name in class configuration array: 'folderName' => 'xxx'
                 *
                 * class definition:
                 * - a string: representing the class name of the object to be created
                 * - a configuration array: the array must contain a `class` element which is treated as the object class,
                 *   and the rest of the name-value pairs will be used to initialize the corresponding object properties
                 * - a PHP callable: either an anonymous function or an array representing a class method (`[$class or $object, $method]`).
                 *   The callable should return a new instance of the object being created.
                 */
                'basic' => 'app\models\Basic',
                'basic2' => [
                    'class' => 'app\models\BasicSearch',
                    'folderName' => 'basic', // Use the same path for uploads
                    //'public' => 1, // Set 1 by default
                ],
                'example' => 'app\models\Example',
                'post' => 'app\models\Post',
                'category' => 'app\models\Category',
                'blog' => 'app\models\Blog',
                'department' => 'app\models\Department',
                'common' => 'app\models\CommonAdmin',
            ],
            'registerControllers' => [
                /**
                 * Add controllers.
                 *
                 * Mapping from controller ID to controller configurations.
                 * Each name-value pair specifies the configuration of a single controller.
                 * A controller configuration can be either a string or an array.
                 * If the former, the string should be the fully qualified class name of the controller.
                 * If the latter, the array must contain a 'class' element which specifies
                 * the controller's fully qualified class name, and the rest of the name-value pairs
                 * in the array are used to initialize the corresponding controller properties. For example,
                 *
                 * [
                 *   'account' => 'app\controllers\UserController',
                 *   'article' => [
                 *      'class' => 'app\controllers\PostController',
                 *      'defaultAction' => 'xxx',
                 *   ],
                 * ]
                 */
                'test' => [
                    'class' => 'app\controllers\admin\TestController',
                    'defaultAction' => 'index', // override default value
                ],
            ],
            'registerUrlRules' => [
                /**
                 * Add URL rules.
                 *
                 * Usage:
                 * [
                 *   'pattern' => 'route',
                 *   'pattern' => 'route',
                 * ]
                 */
                'test/<action:\w+>' => 'test/<action>',
                'test' => 'test/index',
            ],
            'sidebarItems' => [
                /**
                 * Add Nav widget items.
                 *
                 * A list of items in the nav widget. Each array element represents a single
                 * menu item which can be either a string or an array with the following structure:
                 *
                 * - label: string, required, the nav item label.
                 * - url: optional, the item's URL. Defaults to "#".
                 * - visible: boolean, optional, whether this menu item is visible. Defaults to true.
                 * - linkOptions: array, optional, the HTML attributes of the item's link.
                 * - options: array, optional, the HTML attributes of the item container (LI).
                 * - active: boolean, optional, whether the item should be on active state or not.
                 * - items: array|string, optional, the configuration array for creating a [[Dropdown]] widget,
                 *   or a string representing the dropdown menu. Note that Bootstrap does not support sub-dropdown menus.
                 *
                 * If a menu item is a string, it will be rendered directly without HTML encoding.
                 */
                ['label' => 'Test index', 'url' => ['test/index']],
                ['label' => 'Test view', 'url' => ['test/view']],
            ],
        ],
    ],

    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment

    // Debug module seems to break some functionality with PHP 5.4.
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
