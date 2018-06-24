<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 24.06.2018
 * Time: 13:35
 */

/** @var $model \frontend\models\User */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\widgets\MaskedInput;
use common\widgets\Alert;

$this->title                   = Yii::t('app', 'Профиль');
$this->params['breadcrumbs'][] = $this->title;
$this->registerMetaTag([
    'name' => 'description',
    'content' => $this->title
]);
?>
<div class="container">
    <div id="main">
        <h1 class="page-header"><?=$this->title?></h1>
        <?php $form = ActiveForm::begin(['id' => 'profile-form']); ?>

            <?= $form->field($model, 'username')->textInput(['class' => 'control-label']) ?>

            <?= $form->field($model, 'phone')->textInput(['class' => 'control-label', 'placeholder' => Yii::t('app', 'Введите телефон')])->widget(MaskedInput::class,[
                'name' => 'phone',
                'mask' => '+9(999)999-99-99'
            ]) ?>

            <?= $form->field($model, 'email') ?>

            <?= $form->field($model, 'password')->passwordInput()->hint(Yii::t('app', 'Оставте пустым, если не нужно изменять')) ?>

            <?= $form->field($model, 'confirm')->passwordInput() ?>

            <div class="button-login">
                <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-primary arrow-right']) ?>
            </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
