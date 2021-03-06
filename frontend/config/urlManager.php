<?php
/**
 * Created by PhpStorm.
 * User: Manager
 * Date: 19.09.2016
 * Time: 16:10
 */

return [
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'enableStrictParsing' => true,
    'baseUrl' => '/',
    'suffix' => '',
    'scriptUrl'=>'/frontend/index.php',
    'rules' => [
        '' => 'site/index',

        'user/login' => 'site/login',
        'user/logout' => 'site/logout',
        'passwordreset' => 'site/requestpasswordreset',
        'resetpassword' => 'site/resetpassword',

        'realty/create' => 'realty/create',
        'articles/<url:[\w\d\_\-]+>' => 'article/view',
        'realty/detail/<url:[\w\d\_\-]+>' => 'realty/detail',
        'realty/list/<filter:\w+>' => 'realty/list',
        'realty/list' => 'realty/list',
        'realty/personal' => 'realty/personal',
        'realty/apply/<reservation:\d+>' => 'realty/apply',
        'user/realty' => 'user/realty',
        'realty/additional/<reservation:\d+>' => 'realty/additional',
        'user/decline/<reservation:\d+>' => 'user/decline',

        '<controller:\w+>/<id:\d+>/<action:(create|update|delete)>' => '<controller>/<action>',
        '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
        '<controller:\w+>' => '<controller>/index',
    ],
];
