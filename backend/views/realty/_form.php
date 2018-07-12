<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Realty */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="realty-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php if ($model->isNewRecord) { ?>
        <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
    <?php } ?>

    <?= $form->field($model, 'status_id')->dropDownList(\backend\models\Status::getDropDown()) ?>

    <?= $form->field($model, 'user_id')->dropDownList(\backend\models\Users::getDropDown()) ?>

    <?= $form->field($model, 'country_id')->dropDownList(\backend\models\Country::getDropDown()) ?>

    <?= $form->field($model, 'city_id')->dropDownList(\backend\models\City::getDropDown()) ?>

    <?= $form->field($model, 'type_housing_id')->dropDownList(\backend\models\TypeHousing::getDropDown()) ?>

    <?= $form->field($model, 'places')->textInput() ?>

    <?= $form->field($model, 'street')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'house')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'housing')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apartment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'footage')->textInput() ?>

    <?= $form->field($model, 'number_rooms')->textInput() ?>

    <?= $form->field($model, 'pledge')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'laws')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'longitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'latitude')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
