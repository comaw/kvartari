<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "{{%user_realty_search}}".
 *
 * @property string $id
 * @property string $user_id
 * @property string $country_id
 * @property string $city_id
 * @property string $type_housing_id
 * @property int $places
 * @property int $footage
 * @property int $number_rooms
 * @property int $price_from
 * @property int $price_to
 *
 * @property City $city
 * @property Country $country
 * @property TypeHousing $typeHousing
 * @property User $user
 * @property UserRealtySearchDeviceService[] $userRealtySearchDeviceServices
 * @property DeviceService[] $deviceServices
 * @property UserRealtySearchTerm[] $userRealtySearchTerms
 * @property Term[] $terms
 */
class UserRealtySearch extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_realty_search}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'country_id', 'city_id', 'type_housing_id'], 'required'],
            [['user_id', 'country_id', 'city_id', 'type_housing_id', 'places', 'footage', 'number_rooms', 'price_from', 'price_to'], 'integer'],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::class, 'targetAttribute' => ['city_id' => 'id']],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::class, 'targetAttribute' => ['country_id' => 'id']],
            [['type_housing_id'], 'exist', 'skipOnError' => true, 'targetClass' => TypeHousing::class, 'targetAttribute' => ['type_housing_id' => 'id']],
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
            'country_id' => Yii::t('app', 'Country ID'),
            'city_id' => Yii::t('app', 'City ID'),
            'type_housing_id' => Yii::t('app', 'Type Housing ID'),
            'places' => Yii::t('app', 'Places'),
            'footage' => Yii::t('app', 'Footage'),
            'number_rooms' => Yii::t('app', 'Number Rooms'),
            'price_from' => Yii::t('app', 'Price From'),
            'price_to' => Yii::t('app', 'Price To'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::class, ['id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::class, ['id' => 'country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTypeHousing()
    {
        return $this->hasOne(TypeHousing::class, ['id' => 'type_housing_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserRealtySearchDeviceServices()
    {
        return $this->hasMany(UserRealtySearchDeviceService::class, ['user_realty_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeviceServices()
    {
        return $this->hasMany(DeviceService::class, ['id' => 'device_service_id'])->viaTable('{{%user_realty_search_device_service}}', ['user_realty_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserRealtySearchTerms()
    {
        return $this->hasMany(UserRealtySearchTerm::class, ['user_realty_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTerms()
    {
        return $this->hasMany(Term::class, ['id' => 'term_id'])->viaTable('{{%user_realty_search_term}}', ['user_realty_id' => 'id']);
    }
}
