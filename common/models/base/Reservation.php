<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "{{%reservation}}".
 *
 * @property string $id
 * @property string $user_id
 * @property string $realty_id
 * @property string $status
 * @property string $phone
 * @property string $name
 * @property string $email
 * @property string $date_from
 * @property string $date_to
 * @property string $arrival_date
 * @property string $comment
 * @property string $comment_admin
 * @property string $address_id
 *
 * @property Realty $realty
 * @property ReservationAddresses[] $reservationAddresses
 */
class Reservation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%reservation}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'realty_id', 'status', 'phone', 'name', 'email', 'address_id'], 'required'],
            [['user_id', 'realty_id', 'status', 'address_id'], 'integer'],
            [['date_from', 'date_to', 'arrival_date'], 'safe'],
            [['comment', 'comment_admin'], 'string'],
            [['phone', 'name', 'email'], 'string', 'max' => 255],
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
            'user_id' => Yii::t('app', 'User ID'),
            'realty_id' => Yii::t('app', 'Realty ID'),
            'status' => Yii::t('app', 'Status'),
            'phone' => Yii::t('app', 'Phone'),
            'name' => Yii::t('app', 'Name'),
            'email' => Yii::t('app', 'Email'),
            'date_from' => Yii::t('app', 'Date From'),
            'date_to' => Yii::t('app', 'Date To'),
            'arrival_date' => Yii::t('app', 'Arrival Date'),
            'comment' => Yii::t('app', 'Comment'),
            'comment_admin' => Yii::t('app', 'Comment Admin'),
            'address_id' => Yii::t('app', 'Address ID'),
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
    public function getReservationAddresses()
    {
        return $this->hasMany(ReservationAddresses::class, ['reservation_id' => 'id']);
    }
}
