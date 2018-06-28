<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 28.06.2018
 * Time: 09:48
 */

namespace frontend\models;

/**
 * Class RealtyView
 * @package frontend\models
 */
class RealtyView extends \common\models\RealtyView
{

    /**
     * @return bool
     */
    public function beforeValidate()
    {
        if ($this->isNewRecord) {
            $this->views = 1;
            $this->updated = time();
        }

        return parent::beforeValidate();
    }
}
