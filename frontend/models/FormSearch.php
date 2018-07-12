<?php
/**
 * Project kvartari.
 * File: FormSearch.php
 * Created by Sergey Yanchevsky
 * 12.07.2018 10:21
 */

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * Class FormSearch
 * @package frontend\models
 *
 * @property int $country
 * @property int $city
 * @property int $type_housing_id
 * @property int $price_from
 * @property int $price_to
 */
class FormSearch extends Model
{
    public $country;
    public $city;
    public $type_housing_id;
    public $price_from;
    public $price_to;

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'country' => Yii::t('app', 'Country'),
            'city' => Yii::t('app', 'City'),
            'type_housing_id' => Yii::t('app', 'Type Housing ID'),
            'price_from' => Yii::t('app', 'Price From'),
            'price_to' => Yii::t('app', 'Price To'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['country'], 'required'],
            // email has to be a valid email address
            [['country', 'city', 'type_housing_id', 'price_from', 'price_to'], 'integer'],
        ];
    }
}
