<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 28.06.2018
 * Time: 09:50
 */

namespace common\models;

use Yii;

/**
 * Class Users
 * @package common\models
 */
class Users extends \common\models\base\User
{
    const ROLE_TENANT = 'tenant';
    const ROLE_OWNER = 'owner';
    const ROLE_ADMIN = 'admin';

    /**
     * @return array
     */
    public static function listRoles(): array
    {
        return [
            self::ROLE_TENANT => Yii::t('app', 'Tenant'),
            self::ROLE_OWNER => Yii::t('app', 'Owner'),
            self::ROLE_ADMIN => Yii::t('app', 'Admin'),
        ];
    }

    /**
     * @return array
     */
    public static function listRoleForSignUp(): array
    {
        return [
            self::ROLE_TENANT => Yii::t('app', 'Tenant'),
            self::ROLE_OWNER => Yii::t('app', 'Owner'),
        ];
    }
}
