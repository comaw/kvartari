<?php
/**
 * Created by PhpStorm.
 * User: php-shaman
 * Date: 22.09.2016
 * Time: 12:19
 * Project: Invo-admin
 */

if (is_file(__DIR__ . '/mail.local.php')) {
    return include (__DIR__ . '/mail.local.php');
}

return [
    'class' => 'yii\swiftmailer\Mailer',
    'viewPath' => '@common/mail',
    'useFileTransport' => true,
];
