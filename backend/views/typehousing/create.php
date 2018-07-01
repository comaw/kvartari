<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TypeHousing */

$this->title = Yii::t('app', 'Create Type Housing');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Type Housings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-housing-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
