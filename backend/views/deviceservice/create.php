<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\DeviceService */

$this->title = Yii::t('app', 'Create Device Service');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Device Services'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="device-service-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
