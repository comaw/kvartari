<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "{{%realty_term}}".
 *
 * @property string $realty_id
 * @property string $term_id
 *
 * @property Realty $realty
 * @property Term $term
 */
class RealtyTerm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%realty_term}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['realty_id', 'term_id'], 'required'],
            [['realty_id', 'term_id'], 'integer'],
            [['realty_id', 'term_id'], 'unique', 'targetAttribute' => ['realty_id', 'term_id']],
            [['realty_id'], 'exist', 'skipOnError' => true, 'targetClass' => Realty::class, 'targetAttribute' => ['realty_id' => 'id']],
            [['term_id'], 'exist', 'skipOnError' => true, 'targetClass' => Term::class, 'targetAttribute' => ['term_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'realty_id' => Yii::t('app', 'Realty ID'),
            'term_id' => Yii::t('app', 'Term ID'),
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
    public function getTerm()
    {
        return $this->hasOne(Term::class, ['id' => 'term_id']);
    }
}
