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
    'suffix' => '/',
    'scriptUrl'=>'/frontend/index.php',
    'rules' => [
        '' => 'site/index',

        'signin' => 'site/login',
        'signup' => 'site/signup',
        'passwordreset' => 'site/requestpasswordreset',
        'resetpassword' => 'site/resetpassword',

        '<controller:\w+>/<id:\d+>/<action:(create|update|delete)>' => '<controller>/<action>',
        '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
        '<controller:\w+>' => '<controller>/index',
    ],
];
