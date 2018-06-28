<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 28.06.2018
 * Time: 09:44
 */

namespace common\models;

use yii\helpers\ArrayHelper;

/**
 * Class City
 * @package common\models
 */
class City extends \common\models\base\City
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
