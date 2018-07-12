<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Reservation;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ReservationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Reservations');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reservation-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
//            'user_id',
//            'realty_id',
            [
                'attribute' => 'realty_id',
                'format' => 'raw',
                'contentOptions' => ['style' => 'width:200px; white-space: normal;'],
                'value' => function (Reservation $data) {
                    return $data->realty->street . ' ' . $data->realty->title;
                },
                'filter' => Reservation::listStatus()
            ],
//            'status',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function (Reservation $data) {
                    return Reservation::getStatusName($data->status);
                },
                'filter' => Reservation::listStatus()
            ],
            'phone',
            'name',
            'email',
            'date_from',
            'date_to',
            //'arrival_date',
            'comment:ntext',
            'comment_admin:ntext',
//            'address_id',
            [
                'attribute' => 'address_id',
                'format' => 'raw',
                'contentOptions' => ['style' => 'width:300px; white-space: normal;'],
                'value' => function (Reservation $data) {
                    if (!$data->address) {
                        return null;
                    }

                    return join('<br>', [$data->address->fio, $data->address->date_birth, $data->address->place_birth, $data->address->passport_number]);
                },
                'filter' => false
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
