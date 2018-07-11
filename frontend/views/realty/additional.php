<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 11.07.2018
 * Time: 19:30
 */

use frontend\models\UserAddress;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use kartik\date\DatePicker;

/** @var $model UserAddress */
/** @var $reservation \frontend\widgets\Reservation */

$this->title = Yii::t('app', 'Дополнительно в квартире имеет право проживать');
$this->registerMetaTag([
    'name' => 'description',
    'content' => Yii::t('app', 'Дополнительно в квартире имеет право проживать')
]);
$this->registerMetaTag([
    'property' => 'og:image',
    'content' => '/img/logo.png'
]);

?>

<div class="container">
    <div id="main">
        <h1 class="page-header"><?=$this->title?></h1>
        <div class="row">
            <div class="span12">
                <?php $form = ActiveForm::begin(['id' => 'user-address-form', 'options' => ['enctype' => 'multipart/form-data']]); ?>

                <?= $form->field($model, 'fio')->textInput(['placeholder' => $model->getAttributeLabel('fio')]) ?>
                <?= $form->field($model, 'date_birth')->textInput(['placeholder' => $model->getAttributeLabel('date_birth')])->widget(DatePicker::class, [
                    'options' => ['placeholder' => $model->getAttributeLabel('date_birth')],
                    'value' => date("Y-m-d"),
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd',
                        'todayHighlight' => true,
                        'todayBtn' => true,
                    ]
                ]) ?>
                <?= $form->field($model, 'place_birth')->textInput(['placeholder' => $model->getAttributeLabel('place_birth')]) ?>
                <?= $form->field($model, 'passport_number')->textInput(['placeholder' => $model->getAttributeLabel('passport_number')]) ?>
                <?= $form->field($model, 'photo')->fileInput() ?>
                <?= $form->field($model, 'information')->textarea(['placeholder' => $model->getAttributeLabel('information')]) ?>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-primary']) ?>
                    <a class="btn btn-primary arrow-right" href="<?=\yii\helpers\Url::toRoute(['/user/realty'])?>"><?=Yii::t('app', 'Пропустить')?></a>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
