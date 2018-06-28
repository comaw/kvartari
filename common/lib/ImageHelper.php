<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 28.06.2018
 * Time: 15:20
 */

namespace common\lib;

use frontend\models\Realty;
use Yii;

/**
 * Class ImageHelper
 * @package common\lib
 */
class ImageHelper
{

    /**
     * @param Realty $realty
     * @return string
     */
    public static function getImageRealtyDir(Realty $realty): string
    {
        $dir = Yii::getAlias('@frontend/web/upload/' . date("Y"));
        static::createImageDir($dir);
        $dir .= '/' . date("m");
        static::createImageDir($dir);
        $dir .= '/' . date("d");
        static::createImageDir($dir);
        $dir .= '/' . $realty->id;
        static::createImageDir($dir);

        return $dir . '/';
    }

    /**
     * @return string
     */
    public static function getTempDir(): string
    {
        $dir = Yii::getAlias('@frontend/runtime/upload/');
        static::createImageDir($dir);

        return $dir;
    }

    /**
     * @param string $dir
     * @return bool
     */
    public static function createImageDir(string $dir): bool
    {
        if (!is_dir($dir)) {
            return mkdir($dir, 0777);
        }

        return true;
    }
}
