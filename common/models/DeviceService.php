<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 28.06.2018
 * Time: 09:46
 */

namespace common\models;

use yii\helpers\ArrayHelper;

/**
 * Class DeviceService
 * @package common\models
 */
class DeviceService extends \common\models\base\DeviceService
{
    /**
     * @param string $from
     * @param string $to
     * @return array
     */
    public static function getDropDown(string $from = 'id', string $to = 'name'): array
    {
        return ArrayHelper::map(static::find()->select([$from, $to])->orderBy('id')->all(), $from, $to);
    }
}
