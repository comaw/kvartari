<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 08.07.2018
 * Time: 18:48
 */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\models\Reservation;
use yii\widgets\MaskedInput;
use kartik\date\DatePicker;

/** @var $model Reservation */
/** @var $realty \frontend\models\Realty */

?>
<?php $form = ActiveForm::begin(['id' => 'realty-reservation-form']); ?>
<div class="control-group">
    <div class="controls">
        <?= $form->field($model, 'date_from')->textInput(['class' => 'control-label', 'placeholder' => $model->getAttributeLabel('date_from')])->label('')->widget(DatePicker::class, [
            'options' => ['placeholder' => $model->getAttributeLabel('date_from')],
            'value' => date("Y-m-d"),
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
                'todayHighlight' => true,
                'todayBtn' => true,
            ]
        ]) ?>
    </div>
</div>
<div class="control-group">
    <div class="controls">
        <?= $form->field($model, 'date_to')->textInput(['class' => 'control-label', 'placeholder' => $model->getAttributeLabel('date_to')])->label('')->widget(DatePicker::class, [
            'options' => ['placeholder' => $model->getAttributeLabel('date_from')],
            'value' => date("Y-m-d"),
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
                'todayHighlight' => true,
                'todayBtn' => true,
            ]
        ]) ?>
    </div>
</div>
<hr style="margin:4px 0;">
<?php if(!Yii::$app->user->isGuest):?>
    <div class="control-group">
        <div class="controls">
            <?= $form->field($model, 'phone')->textInput(['class' => 'control-label', 'placeholder' => $model->getAttributeLabel('phone')])->label('')->widget(MaskedInput::class,[
                'name' => 'phone',
                'mask' => '+9(999)999-99-99'
            ]) ?>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <?= $form->field($model, 'name')->textInput(['class' => 'control-label', 'placeholder' => $model->getAttributeLabel('name')])->label('') ?>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <?= $form->field($model, 'email')->textInput(['class' => 'control-label', 'placeholder' => $model->getAttributeLabel('email')])->label('') ?>
        </div>
    </div>
<?php endif; ?>
<div class="control-group">
    <div class="controls">
        <?= $form->field($model, 'comment')->textarea(['class' => 'control-label', 'placeholder' => $model->getAttributeLabel('comment')])->label('') ?>
    </div>
</div>
<div style="margin:12px 0;">
    Стоимость: <span id="priceCalculation"><?=Yii::$app->formatter->asDecimal($realty->price)?></span> руб. <div style="margin-left:72px;">+<?=Yii::$app->formatter->asDecimal($realty->pledge)?> руб. (залог)</div>
</div>
<div class="form-actions" style="text-align:center">
    <?= Html::submitButton('Забронировать', ['class'=>'btn btn-primary arrow-right']); ?>
</div>
<?php ActiveForm::end(); ?>
