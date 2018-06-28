<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 28.06.2018
 * Time: 09:47
 */

namespace common\models;

use common\UrlHelper;
use Yii;

/**
 * Class Realty
 * @package common\models
 */
class Realty extends \common\models\base\Realty
{
    /**
     * @return bool
     */
    public function beforeValidate()
    {
        if (!$this->url) {
            $this->url = mb_substr($this->title, 0, 240, Yii::$app->charset) . '_' . $this->country_id . '_' . $this->city_id . '_' . date("d");
        }
        $this->url = UrlHelper::translateUrl($this->url);

        return parent::beforeValidate();
    }
}
