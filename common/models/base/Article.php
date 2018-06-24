<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "{{%article}}".
 *
 * @property string $id
 * @property int $active
 * @property string $name
 * @property string $url
 * @property string $title
 * @property string $description
 * @property string $text
 * @property string $created
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%article}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['active'], 'integer'],
            [['name', 'url', 'text'], 'required'],
            [['text'], 'string'],
            [['created'], 'safe'],
            [['name', 'url', 'title', 'description'], 'string', 'max' => 255],
            [['url'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'active' => Yii::t('app', 'Active'),
            'name' => Yii::t('app', 'Name'),
            'url' => Yii::t('app', 'Url'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'text' => Yii::t('app', 'Text'),
            'created' => Yii::t('app', 'Created'),
        ];
    }
}
