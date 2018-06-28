<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 28.06.2018
 * Time: 09:49
 */

namespace common\models;

use yii\helpers\ArrayHelper;

/**
 * Class TypeHousing
 * @package common\models
 */
class TypeHousing extends \common\models\base\TypeHousing
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
