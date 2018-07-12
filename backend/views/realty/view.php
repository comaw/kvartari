<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Realty */

$this->title = $model->url;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Realties'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="realty-view">

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
            'url',
            [
                'attribute' => 'status_id',
                'value' => $model->status->name,
            ],
            [
                'attribute' => 'user_id',
                'value' => $model->user->username,
            ],
            [
                'attribute' => 'country_id',
                'value' => $model->country->name,
            ],
            [
                'attribute' => 'city_id',
                'value' => $model->city->name,
            ],
            [
                'attribute' => 'type_housing_id',
                'value' => $model->typeHousing->name,
            ],
            'places',
            'street',
            'house',
            'housing',
            'apartment',
            'footage',
            'number_rooms',
            'pledge',
            'price',
            [
                'attribute' => 'created',
                'value' => Yii::$app->formatter->asDate($model->created),
            ],
            'updated',
            [
                'attribute' => 'updated',
                'value' => Yii::$app->formatter->asDate($model->updated),
            ],
            'description:ntext',
            'laws:ntext',
            'longitude',
            'latitude',
        ],
    ]) ?>

</div>
