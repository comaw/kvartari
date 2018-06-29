<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "{{%term}}".
 *
 * @property string $id
 * @property string $name
 *
 * @property RealtyTerm[] $realtyTerms
 * @property Realty[] $realties
 */
class Term extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%term}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealtyTerms()
    {
        return $this->hasMany(RealtyTerm::class, ['term_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealties()
    {
        return $this->hasMany(Realty::class, ['id' => 'realty_id'])->viaTable('{{%realty_term}}', ['term_id' => 'id']);
    }
}
