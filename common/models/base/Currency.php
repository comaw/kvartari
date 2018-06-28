<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "{{%currency}}".
 *
 * @property string $id
 * @property string $name
 * @property int $position
 *
 * @property Service[] $services
 */
class Currency extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%currency}}';
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
    public function getServices()
    {
        return $this->hasMany(Service::class, ['currency_id' => 'id']);
    }
}
