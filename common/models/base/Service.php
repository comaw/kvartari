<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "{{%service}}".
 *
 * @property string $id
 * @property string $name
 * @property int $position
 * @property int $price
 * @property string $currency_id
 *
 * @property RealtyService[] $realtyServices
 * @property Realty[] $realties
 * @property Currency $currency
 */
class Service extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%service}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'currency_id'], 'required'],
            [['position', 'price', 'currency_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['currency_id'], 'exist', 'skipOnError' => true, 'targetClass' => Currency::class, 'targetAttribute' => ['currency_id' => 'id']],
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
            'price' => Yii::t('app', 'Price'),
            'currency_id' => Yii::t('app', 'Currency ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealtyServices()
    {
        return $this->hasMany(RealtyService::class, ['service_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealties()
    {
        return $this->hasMany(Realty::class, ['id' => 'realty_id'])->viaTable('{{%realty_service}}', ['service_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurrency()
    {
        return $this->hasOne(Currency::class, ['id' => 'currency_id']);
    }
}
