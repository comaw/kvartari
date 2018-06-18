<?php
/**
 *
 */

namespace common\lib;

/**
 * Class ListMerchants
 * @package common\lib
 */
class ListMerchants
{

    /**
     * @return array
     */
    public static function listMerchants()
    {
        return [
            'webmoney' => 'webmoney',
        ];
    }

    /**
     * @param string $name
     *
     * @return string|null
     */
    public static function getCurrentMerchant($name)
    {
        return isset(static::listMerchants()[$name]) ? static::listMerchants()[$name] : null;
    }
}