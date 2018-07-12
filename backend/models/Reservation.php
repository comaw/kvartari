<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 08.07.2018
 * Time: 20:00
 */

namespace backend\models;

use frontend\models\UserAddress;
use Yii;

/**
 * Class Reservation
 * @package backend\models
 *
 * @property UserAddress $address
 */
class Reservation extends \common\models\Reservation
{
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddress()
    {
        return $this->hasOne(UserAddress::class, ['id' => 'address_id']);
    }
}
