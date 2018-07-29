<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "{{%user_realty_search_term}}".
 *
 * @property string $user_realty_id
 * @property string $term_id
 *
 * @property Term $term
 * @property UserRealtySearch $userRealty
 */
class UserRealtySearchTerm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_realty_search_term}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_realty_id', 'term_id'], 'required'],
            [['user_realty_id', 'term_id'], 'integer'],
            [['user_realty_id', 'term_id'], 'unique', 'targetAttribute' => ['user_realty_id', 'term_id']],
            [['term_id'], 'exist', 'skipOnError' => true, 'targetClass' => Term::class, 'targetAttribute' => ['term_id' => 'id']],
            [['user_realty_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserRealtySearch::class, 'targetAttribute' => ['user_realty_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_realty_id' => Yii::t('app', 'User Realty ID'),
            'term_id' => Yii::t('app', 'Term ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTerm()
    {
        return $this->hasOne(Term::class, ['id' => 'term_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserRealty()
    {
        return $this->hasOne(UserRealtySearch::class, ['id' => 'user_realty_id']);
    }
}
