<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'sourceLanguage'=>'en_US',
    'language' => 'ru',
    'charset' => 'UTF-8',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\DbCache',
        ],
        'cacheFile' => [
            'class' => 'yii\caching\FileCache',
        ],
        'db' => include (__DIR__ . '/db.php'),
    ],
];
