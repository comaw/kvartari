<?php
/**
 * powered by php-shaman
 * urlManager.php 28.11.2016
 * exchanger
 */


return [
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'enableStrictParsing' => true,
    'baseUrl' => '/admin',
    'suffix' => '/',
    'scriptUrl'=>'/backend/index.php',
    'rules' => [
        '' => 'site/index',

        '<controller:\w+>/<id:\d+>/<action:(create|update|delete)>' => '<controller>/<action>',
        '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
        '<controller:\w+>' => '<controller>/index',
    ],
];
