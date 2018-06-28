<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "{{%country}}".
 *
 * @property string $id
 * @property string $name
 * @property string $code
 * @property int $position
 * @property string $created
 *
 * @property City[] $cities
 * @property Realty[] $realties
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%country}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['position'], 'integer'],
            [['created'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['code'], 'string', 'max' => 10],
            [['name'], 'unique'],
            [['code'], 'unique'],
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
            'code' => Yii::t('app', 'Code'),
            'position' => Yii::t('app', 'Position'),
            'created' => Yii::t('app', 'Created'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCities()
    {
        return $this->hasMany(City::class, ['country_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealties()
    {
        return $this->hasMany(Realty::class, ['country_id' => 'id']);
    }
}
