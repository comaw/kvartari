<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "{{%realty_device_service}}".
 *
 * @property string $realty_id
 * @property string $device_service_id
 *
 * @property DeviceService $deviceService
 * @property Realty $realty
 */
class RealtyDeviceService extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%realty_device_service}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['realty_id', 'device_service_id'], 'required'],
            [['realty_id', 'device_service_id'], 'integer'],
            [['realty_id', 'device_service_id'], 'unique', 'targetAttribute' => ['realty_id', 'device_service_id']],
            [['device_service_id'], 'exist', 'skipOnError' => true, 'targetClass' => DeviceService::class, 'targetAttribute' => ['device_service_id' => 'id']],
            [['realty_id'], 'exist', 'skipOnError' => true, 'targetClass' => Realty::class, 'targetAttribute' => ['realty_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'realty_id' => Yii::t('app', 'Realty ID'),
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
    public function getRealty()
    {
        return $this->hasOne(Realty::class, ['id' => 'realty_id']);
    }
}
