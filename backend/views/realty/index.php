<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Realty;
use backend\models\Status;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\RealtySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Realties');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="realty-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Realty'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
//            'url',
            [
                'attribute' => 'url',
                'format' => 'raw',
                'contentOptions' => ['style' => 'width:200px; white-space: normal;'],
                'value' => function (Realty $data) {
                    return $data->url;
                },
            ],
            [
                'attribute' => 'status_id',
                'format' => 'raw',
                'value' => function (Realty $data) {
                    return $data->status->name;
                },
                'filter' => Status::getDropDown()
            ],
            [
                'attribute' => 'user_id',
                'format' => 'raw',
                'value' => function (Realty $data) {
                    return $data->user->username;
                },
                'filter' => \backend\models\Users::getDropDown()
            ],
            [
                'attribute' => 'country_id',
                'format' => 'raw',
                'value' => function (Realty $data) {
                    return $data->country->name;
                },
                'filter' => \backend\models\Country::getDropDown()
            ],
            [
                'attribute' => 'city_id',
                'format' => 'raw',
                'value' => function (Realty $data) {
                    return $data->city->name;
                },
                'filter' => \backend\models\City::getDropDown()
            ],
            //'city_id',
            //'type_housing_id',
            'places',
//            'street',
            [
                'attribute' => 'street',
                'format' => 'raw',
                'contentOptions' => ['style' => 'width:200px; white-space: normal;'],
                'value' => function (Realty $data) {
                    return $data->street;
                },
            ],
            'house',
//            'housing',
//            'apartment',
            //'footage',
//            'number_rooms',
            'pledge',
            'price',
            //'created',
//            'updated',
            [
                'attribute' => 'updated',
                'format' => 'raw',
                'value' => function (Realty $data) {
                    return Yii::$app->formatter->asDate($data->updated);
                },
                'filter' => false
            ],
            //'title',
            //'description:ntext',
            //'laws:ntext',
            //'longitude',
            //'latitude',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
