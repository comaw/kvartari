<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "{{%realty_service}}".
 *
 * @property string $realty_id
 * @property string $service_id
 *
 * @property Realty $realty
 * @property Service $service
 */
class RealtyService extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%realty_service}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['realty_id', 'service_id'], 'required'],
            [['realty_id', 'service_id'], 'integer'],
            [['realty_id', 'service_id'], 'unique', 'targetAttribute' => ['realty_id', 'service_id']],
            [['realty_id'], 'exist', 'skipOnError' => true, 'targetClass' => Realty::class, 'targetAttribute' => ['realty_id' => 'id']],
            [['service_id'], 'exist', 'skipOnError' => true, 'targetClass' => Service::class, 'targetAttribute' => ['service_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'realty_id' => Yii::t('app', 'Realty ID'),
            'service_id' => Yii::t('app', 'Service ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealty()
    {
        return $this->hasOne(Realty::class, ['id' => 'realty_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Service::class, ['id' => 'service_id']);
    }
}
