<?php

use backend\models\Reservation;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Reservation */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Reservations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="reservation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
//            'user_id',
//            'realty_id',
            [
                'attribute' => 'realty_id',
                'value' => $model->realty->street . ' ' . $model->realty->title
            ],
//            'status',
            [
                'attribute' => 'status',
                'value' => Reservation::getStatusName($model->status)
            ],
            'phone',
            'name',
            'email:email',
            'date_from',
            'date_to',
//            'arrival_date',
            'comment:ntext',
            'comment_admin:ntext',
            'address_id',
            [
                'attribute' => 'address_id',
                'format' => 'raw',
                'contentOptions' => ['style' => 'width:300px; white-space: normal;'],
                'value' => (!$model->address) ? join('<br>', [$model->address->fio, $model->address->date_birth, $model->address->place_birth, $model->address->passport_number]) : ''
            ],
        ],
    ]) ?>

</div>
