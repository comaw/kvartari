<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "{{%device_service}}".
 *
 * @property string $id
 * @property string $name
 * @property int $position
 *
 * @property RealtyDeviceService[] $realtyDeviceServices
 * @property Realty[] $realties
 */
class DeviceService extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%device_service}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['position'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'position' => Yii::t('app', 'Position'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealtyDeviceServices()
    {
        return $this->hasMany(RealtyDeviceService::class, ['device_service_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealties()
    {
        return $this->hasMany(Realty::class, ['id' => 'realty_id'])->viaTable('{{%realty_device_service}}', ['device_service_id' => 'id']);
    }
}
