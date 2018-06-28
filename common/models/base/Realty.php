<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "{{%realty}}".
 *
 * @property string $id
 * @property string $status_id
 * @property string $user_id
 * @property string $country_id
 * @property string $city_id
 * @property string $type_housing_id
 * @property int $places
 * @property int $Столбец 8
 * @property string $street
 * @property string $house
 * @property string $housing
 * @property string $apartment
 * @property int $footage
 * @property int $number_rooms
 * @property int $pledge
 * @property int $price
 * @property string $created
 * @property string $updated
 * @property string $title
 * @property string $description
 * @property string $laws
 * @property string $longitude
 * @property string $latitude
 *
 * @property Image[] $images
 * @property City $city
 * @property Country $country
 * @property Status $status
 * @property TypeHousing $typeHousing
 * @property User $user
 * @property RealtyDeviceService[] $realtyDeviceServices
 * @property DeviceService[] $deviceServices
 * @property RealtyService[] $realtyServices
 * @property Service[] $services
 * @property RealtyView $realtyView
 */
class Realty extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%realty}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status_id', 'user_id', 'country_id', 'city_id', 'type_housing_id', 'places', 'street', 'footage', 'number_rooms', 'price', 'title', 'description'], 'required'],
            [['status_id', 'user_id', 'country_id', 'city_id', 'type_housing_id', 'places', 'footage', 'number_rooms', 'pledge', 'price'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['description', 'laws'], 'string'],
            [['longitude', 'latitude'], 'number'],
            [['street', 'house', 'housing', 'apartment', 'title'], 'string', 'max' => 255],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::class, 'targetAttribute' => ['city_id' => 'id']],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::class, 'targetAttribute' => ['country_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::class, 'targetAttribute' => ['status_id' => 'id']],
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
            'status_id' => Yii::t('app', 'Status ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'country_id' => Yii::t('app', 'Country ID'),
            'city_id' => Yii::t('app', 'City ID'),
            'type_housing_id' => Yii::t('app', 'Type Housing ID'),
            'places' => Yii::t('app', 'Places'),
            'street' => Yii::t('app', 'Street'),
            'house' => Yii::t('app', 'House'),
            'housing' => Yii::t('app', 'Housing'),
            'apartment' => Yii::t('app', 'Apartment'),
            'footage' => Yii::t('app', 'Footage'),
            'number_rooms' => Yii::t('app', 'Number Rooms'),
            'pledge' => Yii::t('app', 'Pledge'),
            'price' => Yii::t('app', 'Price'),
            'created' => Yii::t('app', 'Created'),
            'updated' => Yii::t('app', 'Updated'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'laws' => Yii::t('app', 'Laws'),
            'longitude' => Yii::t('app', 'Longitude'),
            'latitude' => Yii::t('app', 'Latitude'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Image::class, ['realty_id' => 'id']);
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
    public function getStatus()
    {
        return $this->hasOne(Status::class, ['id' => 'status_id']);
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
    public function getRealtyDeviceServices()
    {
        return $this->hasMany(RealtyDeviceService::class, ['realty_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeviceServices()
    {
        return $this->hasMany(DeviceService::class, ['id' => 'device_service_id'])->viaTable('{{%realty_device_service}}', ['realty_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealtyServices()
    {
        return $this->hasMany(RealtyService::class, ['realty_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServices()
    {
        return $this->hasMany(Service::class, ['id' => 'service_id'])->viaTable('{{%realty_service}}', ['realty_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealtyView()
    {
        return $this->hasOne(RealtyView::class, ['id' => 'id']);
    }
}
