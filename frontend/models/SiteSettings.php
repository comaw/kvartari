<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 01.07.2018
 * Time: 15:29
 */

namespace frontend\models;

/**
 * Class SiteSettings
 * @package frontend\models
 */
class SiteSettings extends \common\models\SiteSettings
{
    protected static $settings = [];

    /**
     * @return array
     */
    public static function setSettings(): array
    {
        if (!static::$settings) {
            $models = static::find()->all();
            foreach ($models as $model) {
                static::$settings[$model->name] = $model->value;
            }
        }

        return static::$settings;
    }

    /**
     * @param string $key
     * @return array|mixed|string
     */
    public static function getSettings(string $key = '')
    {
        if (!$key) {
            return static::setSettings();
        }

        return static::setSettings()[$key] ?? '';
    }
}
