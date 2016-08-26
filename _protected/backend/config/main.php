<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'assetManager' => [
            'bundles' => [
                'dmstr\web\AdminLteAsset' => [
                    'skin' => 'skin-green-light',
                ],
            ],
        ],
        // here you can set theme used for your backend application 
        // - template comes with: 'default', 'slate', 'spacelab' and 'cerulean'
        'view' => [
            'theme' => [
//                'pathMap' => ['@app/views' => '@webroot/themes/slate/views'],
//                'baseUrl' => '@web/themes/slate',
                'pathMap' => ['@backend/views' => '@backend/themes/adminlte/views'],
                'baseUrl' => '@web/themes/adminlte',            ],
        ],
        'user' => [
            'identityClass' => 'common\models\UserIdentity',
            'enableAutoLogin' => true,
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
    ],
    'params' => $params,
];
