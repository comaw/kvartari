<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "{{%city}}".
 *
 * @property string $id
 * @property string $country_id
 * @property string $name
 * @property int $position
 * @property string $created
 *
 * @property Country $country
 * @property Realty[] $realties
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%city}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['country_id', 'name'], 'required'],
            [['country_id', 'position'], 'integer'],
            [['created'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::class, 'targetAttribute' => ['country_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'country_id' => Yii::t('app', 'Country ID'),
            'name' => Yii::t('app', 'Name'),
            'position' => Yii::t('app', 'Position'),
            'created' => Yii::t('app', 'Created'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::class, ['id' => 'country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealties()
    {
        return $this->hasMany(Realty::class, ['city_id' => 'id']);
    }
}
