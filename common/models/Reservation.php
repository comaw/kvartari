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
    public function rules()
    {
        return ArrayHelper::merge([
            [['user_id', 'realty_id', 'status', 'phone', 'name', 'email', 'date_from', 'date_to'], 'required'],
        ], parent::rules());
    }
}
