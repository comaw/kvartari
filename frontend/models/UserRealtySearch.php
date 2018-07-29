<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 29.07.2018
 * Time: 15:13
 */

namespace frontend\models;

use yii\helpers\ArrayHelper;

/**
 * Class UserRealtySearch
 * @package frontend\models
 *
 * @property array $serviceDeviceIds
 * @property array $termIds
 */
class UserRealtySearch extends \common\models\UserRealtySearch
{
    public $serviceDeviceIds = [];
    public $termIds = [];

    /**
     * @return $this
     */
    public function setTermIds()
    {
        if (!$this->userRealtySearchTerms) {
            $this->termIds = [];

            return $this;
        }
        $this->termIds = ArrayHelper::map($this->userRealtySearchTerms, 'term_id', 'term_id');

        return $this;
    }

    /**
     * @return $this
     */
    public function setServiceDeviceIds()
    {
        if (!$this->userRealtySearchDeviceServices) {
            $this->serviceDeviceIds = [];

            return $this;
        }
        $this->serviceDeviceIds = ArrayHelper::map($this->userRealtySearchDeviceServices, 'device_service_id', 'device_service_id');

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            [['serviceDeviceIds'], 'each', 'rule' => ['integer']],
            [['termIds'], 'each', 'rule' => ['integer']],
        ]);
    }

    /**
     * @param bool  $insert
     * @param array $changedAttributes
     */
    public function afterSave($insert, $changedAttributes)
    {

        UserRealtySearchDeviceService::deleteAll(['=', 'user_realty_id', $this->id]);
        if ($this->serviceDeviceIds) {
            foreach ($this->serviceDeviceIds as $serviceDeviceId) {
                $model = new UserRealtySearchDeviceService();
                $model->user_realty_id  = $this->id;
                $model->device_service_id = $serviceDeviceId;
                $model->save(false);
            }
        }
        UserRealtySearchTerm::deleteAll(['=', 'user_realty_id', $this->id]);
        if ($this->termIds) {
            foreach ($this->termIds as $termId) {
                $model = new UserRealtySearchTerm();
                $model->user_realty_id  = $this->id;
                $model->term_id = $termId;
                $model->save(false);
            }
        }

        parent::afterSave($insert, $changedAttributes);
    }
}
