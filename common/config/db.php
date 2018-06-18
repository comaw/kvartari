<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 12.05.2018
 * Time: 17:18
 */

if (is_file(__DIR__ . '/db.local.php')) {
    return require (__DIR__ . '/db.local.php');
}

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2advanced',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
    'tablePrefix' => 'kv_',
    'enableSchemaCache' => true,
    'schemaCacheDuration' => 5,
    'schemaCache' => 'cacheFile',
];
