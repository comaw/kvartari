<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Realty */

$this->title = Yii::t('app', 'Create Realty');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Realties'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="realty-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
