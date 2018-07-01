<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Service;
use backend\models\Currency;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ServiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Services');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a(Yii::t('app', 'Create Service'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'position',
            'price',
            [
                'attribute' => 'currency_id',
                'format' => 'raw',
                'value' => function (Service $model) {
                    return $model->currency->name;
                },
                'filter' => Currency::getDropDown()
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
