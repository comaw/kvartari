<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "{{%user_address}}".
 *
 * @property string $id
 * @property string $user_id
 * @property string $type
 * @property string $fio
 * @property string $date_birth
 * @property string $place_birth
 * @property string $passport_number
 * @property string $information
 *
 * @property Reservation[] $reservations
 * @property User $user
 */
class UserAddress extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_address}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'fio', 'date_birth', 'place_birth', 'passport_number'], 'required'],
            [['user_id', 'type'], 'integer'],
            [['date_birth'], 'safe'],
            [['fio', 'place_birth', 'passport_number'], 'string', 'max' => 255],
            [['information'], 'string', 'max' => 4000],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'type' => Yii::t('app', 'Type'),
            'fio' => Yii::t('app', 'Fio'),
            'date_birth' => Yii::t('app', 'Date Birth'),
            'place_birth' => Yii::t('app', 'Place Birth'),
            'passport_number' => Yii::t('app', 'Passport Number'),
            'information' => Yii::t('app', 'Information'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservations()
    {
        return $this->hasMany(Reservation::class, ['address_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
