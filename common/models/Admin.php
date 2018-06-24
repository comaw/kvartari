<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 19.06.2018
 * Time: 23:55
 */

namespace common\models;

/**
 * Class Admin
 * @package common\models
 */
class Admin extends User
{
    /**
     * Finds user by email
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['email' => $username, 'status' => self::STATUS_ACTIVE]);
    }
}
