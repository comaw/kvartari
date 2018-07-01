<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "{{%site_settings}}".
 *
 * @property string $name
 * @property string $value
 * @property string $title
 */
class SiteSettings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%site_settings}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['value'], 'string'],
            [['name', 'title'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Name'),
            'value' => Yii::t('app', 'Value'),
            'title' => Yii::t('app', 'Title'),
        ];
    }
}
