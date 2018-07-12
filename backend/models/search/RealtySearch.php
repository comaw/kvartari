<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Realty;

/**
 * RealtySearch represents the model behind the search form of `backend\models\Realty`.
 */
class RealtySearch extends Realty
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status_id', 'user_id', 'country_id', 'city_id', 'type_housing_id', 'places', 'footage', 'number_rooms', 'pledge', 'price'], 'integer'],
            [['url', 'street', 'house', 'housing', 'apartment', 'created', 'updated', 'title', 'description', 'laws'], 'safe'],
            [['longitude', 'latitude'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Realty::find()->with(['terms', 'images', 'city', 'country', 'status', 'typeHousing']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'status_id' => $this->status_id,
            'user_id' => $this->user_id,
            'country_id' => $this->country_id,
            'city_id' => $this->city_id,
            'type_housing_id' => $this->type_housing_id,
            'places' => $this->places,
            'footage' => $this->footage,
            'number_rooms' => $this->number_rooms,
            'pledge' => $this->pledge,
            'price' => $this->price,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
        ]);

        $query->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'street', $this->street])
            ->andFilterWhere(['like', 'house', $this->house])
            ->andFilterWhere(['like', 'housing', $this->housing])
            ->andFilterWhere(['like', 'apartment', $this->apartment])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'created', $this->created])
            ->andFilterWhere(['like', 'updated', $this->updated])
            ->andFilterWhere(['like', 'laws', $this->laws]);

        return $dataProvider;
    }
}
