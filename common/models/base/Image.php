<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "{{%image}}".
 *
 * @property string $id
 * @property string $name
 * @property string $realty_id
 * @property int $position
 * @property string $title
 * @property string $created
 *
 * @property Realty $realty
 */
class Image extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%image}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'realty_id'], 'required'],
            [['realty_id', 'position'], 'integer'],
            [['created'], 'safe'],
            [['name', 'title'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['realty_id'], 'exist', 'skipOnError' => true, 'targetClass' => Realty::class, 'targetAttribute' => ['realty_id' => 'id']],
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
            'realty_id' => Yii::t('app', 'Realty ID'),
            'position' => Yii::t('app', 'Position'),
            'title' => Yii::t('app', 'Title'),
            'created' => Yii::t('app', 'Created'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealty()
    {
        return $this->hasOne(Realty::class, ['id' => 'realty_id']);
    }
}
