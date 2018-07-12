<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 28.06.2018
 * Time: 09:50
 */

namespace backend\models;

use phpDocumentor\Reflection\Types\Static_;
use yii\helpers\ArrayHelper;

/**
 * Class Users
 * @package backend\models
 */
class Users extends \common\models\Users
{

    /**
     * @return array
     */
    public static function getDropDown(): array
    {
        return ArrayHelper::map(static::find()->select(['id', 'username'])->orderBy('username')->all(), 'id', 'username');
    }
}
