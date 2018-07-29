<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "{{%user_realty_search_device_service}}".
 *
 * @property string $user_realty_id
 * @property string $device_service_id
 *
 * @property DeviceService $deviceService
 * @property UserRealtySearch $userRealty
 */
class UserRealtySearchDeviceService extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_realty_search_device_service}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_realty_id', 'device_service_id'], 'required'],
            [['user_realty_id', 'device_service_id'], 'integer'],
            [['user_realty_id', 'device_service_id'], 'unique', 'targetAttribute' => ['user_realty_id', 'device_service_id']],
            [['device_service_id'], 'exist', 'skipOnError' => true, 'targetClass' => DeviceService::class, 'targetAttribute' => ['device_service_id' => 'id']],
            [['user_realty_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserRealtySearch::class, 'targetAttribute' => ['user_realty_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_realty_id' => Yii::t('app', 'User Realty ID'),
            'device_service_id' => Yii::t('app', 'Device Service ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeviceService()
    {
        return $this->hasOne(DeviceService::class, ['id' => 'device_service_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserRealty()
    {
        return $this->hasOne(UserRealtySearch::class, ['id' => 'user_realty_id']);
    }
}
