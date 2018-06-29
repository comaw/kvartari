<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 28.06.2018
 * Time: 09:49
 */

namespace common\models;

use yii\helpers\ArrayHelper;
use Yii;

/**
 * Class Status
 * @package common\models
 */
class Status extends \common\models\base\Status
{
    const STATUS_NEW    = 1;
    const STATUS_ACTIVE = 2;
    const STATUS_CANCEL = 3;
    const STATUS_BAN    = 4;

    /**
     * @return array
     */
    public static function getListStatus(): array
    {
        return [
            self::STATUS_NEW    => Yii::t('app', 'Новае обьявление'),
            self::STATUS_ACTIVE => Yii::t('app', 'Активно'),
            self::STATUS_CANCEL => Yii::t('app', 'Отказано'),
            self::STATUS_BAN    => Yii::t('app', 'Бан'),
        ];
    }

    /**
     * @param int $statusId
     * @return string
     */
    public static function getStatusName(int $statusId): string
    {
        return static::getListStatus()[$statusId] ?? 'undefined';
    }

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
