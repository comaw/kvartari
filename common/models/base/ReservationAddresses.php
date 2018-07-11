<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "{{%reservation_addresses}}".
 *
 * @property int $id
 * @property string $reservation_id
 * @property string $fio
 * @property string $date_birth
 * @property string $place_birth
 * @property string $passport_number
 * @property string $information
 *
 * @property Reservation $reservation
 */
class ReservationAddresses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%reservation_addresses}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reservation_id', 'fio', 'date_birth', 'place_birth', 'passport_number'], 'required'],
            [['reservation_id'], 'integer'],
            [['date_birth'], 'safe'],
            [['fio', 'place_birth', 'passport_number'], 'string', 'max' => 255],
            [['information'], 'string', 'max' => 4000],
            [['reservation_id'], 'exist', 'skipOnError' => true, 'targetClass' => Reservation::class, 'targetAttribute' => ['reservation_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'reservation_id' => Yii::t('app', 'Reservation ID'),
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
    public function getReservation()
    {
        return $this->hasOne(Reservation::class, ['id' => 'reservation_id']);
    }
}
