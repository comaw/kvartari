<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SiteSettings */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="site-settings-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if ($model->isNewRecord) { ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?php } ?>

    <?= $form->field($model, 'value')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
