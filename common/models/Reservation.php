<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 08.07.2018
 * Time: 20:00
 */

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * Class Reservation
 * @package common\models
 */
class Reservation extends \common\models\base\Reservation
{

    /**
     * @return array
     */
    public static function listStatus(): array
    {
        return [
            1 => Yii::t('app', 'Ждет подтверждения оплаты'),
            2 => Yii::t('app', 'Оплата зарезервированна'),
            3 => Yii::t('app', 'Отказ'),
            4 => Yii::t('app', 'Закрыто'),
        ];
    }

    /**
     * @param int $status
     * @return string
     */
    public static function getStatusName(int $status): string
    {
        return static::listStatus()[$status] ?? '';
    }


    public function rules()
    {
        return ArrayHelper::merge([
            [['date_from', 'date_to', 'arrival_date', 'comment', 'comment_admin', 'phone', 'name', 'email'], 'filter', 'filter' => 'trim'],
            [['date_from', 'date_to', 'arrival_date', 'comment', 'comment_admin', 'phone', 'name', 'email'], 'filter', 'filter' => 'strip_tags'],
            [['user_id', 'realty_id', 'status', 'phone', 'name', 'email', 'date_from', 'date_to'], 'required'],
        ], parent::rules());
    }
}
