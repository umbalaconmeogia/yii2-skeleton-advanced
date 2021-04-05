<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'psql:host=localhost;dbname=yii2_skeleton',
            'username' => 'yii2_skeleton',
            'password' => 'yii2_skeleton',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning', 'info', 'trace'],
                    'logVars' => [],
                    'except' => ['yii\db\*'],
                    'maxLogFiles' => 50,
                    'logFile' => '@app/runtime/logs/' . date('Ymd') . '_app.log',
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning', 'info', 'trace'],
                    'logVars' => [],
                    'categories' => ['yii\db\*'],
                    'maxLogFiles' => 50,
                    'logFile' => '@app/runtime/logs/' . date('Ymd') . '_sql.log',
                ],
            ],
        ],
    ],
];
