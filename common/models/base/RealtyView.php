<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "{{%realty_view}}".
 *
 * @property string $id
 * @property string $views
 * @property string $created
 * @property string $updated
 *
 * @property Realty $id0
 */
class RealtyView extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%realty_view}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'views', 'updated'], 'integer'],
            [['created'], 'safe'],
            [['id'], 'unique'],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Realty::class, 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'views' => Yii::t('app', 'Views'),
            'created' => Yii::t('app', 'Created'),
            'updated' => Yii::t('app', 'Updated'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(Realty::class, ['id' => 'id']);
    }
}
