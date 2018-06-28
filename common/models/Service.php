<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 28.06.2018
 * Time: 09:48
 */

namespace common\models;

use yii\helpers\ArrayHelper;

/**
 * Class Service
 * @package common\models
 */
class Service extends \common\models\base\Service
{
    /**
     * @param string $from
     * @param string $to
     * @return array
     */
    public static function getDropDown(string $from = 'id', string $to = 'name'): array
    {
        return ArrayHelper::map(static::find()->orderBy('id')->all(), $from, $to);
    }
}
