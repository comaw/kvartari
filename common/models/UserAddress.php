<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 11.07.2018
 * Time: 19:19
 */

namespace common\models;

use yii\helpers\ArrayHelper;

/**
 * Class UserAddress
 * @package common\models
 */
class UserAddress extends \common\models\base\UserAddress
{
    public function rules()
    {
        return ArrayHelper::merge([
            [['fio', 'place_birth', 'passport_number', 'information', 'date_birth'], 'filter', 'filter' => 'trim'],
            [['fio', 'place_birth', 'passport_number', 'information', 'date_birth'], 'filter', 'filter' => 'strip_tags'],
        ], parent::rules());
    }
}
