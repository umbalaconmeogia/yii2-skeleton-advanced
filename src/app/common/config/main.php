<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/../yii2/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
    'modules' => [
        'i18nui' => [
            'class' => 'umbalaconmeogia\i18nui\Module',
            'languages' => ['en', 'ja', 'vi'], // Any languages that you want to use
        ],
        'systemuser' => [
            'class' => 'umbalaconmeogia\systemuser\Module',
        ],
    ],
];
