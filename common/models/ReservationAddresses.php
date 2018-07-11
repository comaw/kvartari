<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 11.07.2018
 * Time: 21:56
 */

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * Class ReservationAddresses
 * @package common\models
 */
class ReservationAddresses extends \common\models\base\ReservationAddresses
{
    public function rules()
    {
        return ArrayHelper::merge([
            [['fio', 'place_birth', 'passport_number', 'information', 'date_birth'], 'filter', 'filter' => 'trim'],
            [['fio', 'place_birth', 'passport_number', 'information', 'date_birth'], 'filter', 'filter' => 'strip_tags'],
        ], parent::rules());
    }
}
