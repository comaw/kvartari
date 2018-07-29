<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 29.07.2018
 * Time: 15:13
 */

namespace frontend\models;

use yii\helpers\ArrayHelper;
use yii\db\ActiveQuery;
use Yii;

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
     * @param ActiveQuery $query
     * @return ActiveQuery the newly created [[ActiveQuery]] instance.
     */
    public static function findCreate($query)
    {
        /** @var static $model */
        $model = static::find()->where(['=', 'user_id', Yii::$app->user->id])->one();
        if (!$model) {
            return $query;
        }
        if ($model->country_id) {
            $query->andWhere(['=', 'country_id', $model->country_id]);
        }
        if ($model->city_id) {
            $query->andWhere(['=', 'city_id', $model->city_id]);
        }
        if ($model->type_housing_id) {
            $query->andWhere(['=', 'type_housing_id', $model->type_housing_id]);
        }
        if ($model->places) {
            $query->andWhere(['=', 'places', $model->places]);
        }
        if ($model->footage) {
            $query->andWhere(['=', 'footage', $model->footage]);
        }
        if ($model->number_rooms) {
            $query->andWhere(['=', 'number_rooms', $model->number_rooms]);
        }
        if ($model->price_from) {
            $query->andWhere(['>=', 'price', $model->price_from]);
        }
        if ($model->price_to) {
            $query->andWhere(['<=', 'price', $model->price_to]);
        }
        $userTerms = UserRealtySearchTerm::find()->where(['=', 'user_realty_id', $model->id])->all();
        $userDevices = UserRealtySearchDeviceService::find()->where(['=', 'user_realty_id', $model->id])->all();
        if ($userTerms || $userDevices) {
            $query->joinWith(['terms', 'deviceServices']);
        }

        if ($userTerms) {
            foreach ($userTerms as $term) {
                $query->andWhere(['=', '{{%realty_term}}.term_id', $term->term_id]);
            }
        }

        if ($userDevices) {
            foreach ($userDevices as $device) {
                $query->andWhere(['=', '{{%realty_device_service}}.device_service_id', $device->device_service_id]);
            }
        }

        return $query;
    }

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
