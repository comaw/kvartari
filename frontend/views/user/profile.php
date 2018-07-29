<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 24.06.2018
 * Time: 13:35
 */

/** @var $model \frontend\models\User */
/** @var $modelRealtySearch \frontend\models\UserRealtySearch */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\widgets\MaskedInput;
use frontend\models\UserRealtySearch;
use frontend\models\Country;
use frontend\models\City;
use frontend\models\TypeHousing;
use frontend\models\DeviceService;
use frontend\models\Term;

$this->title                   = Yii::t('app', 'Профиль');
$this->params['breadcrumbs'][] = $this->title;
$this->registerMetaTag([
    'name' => 'description',
    'content' => $this->title
]);
$this->registerMetaTag([
    'property' => 'og:image',
    'content' => '/img/logo.png'
]);
?>
<div class="container">
    <div id="main">
        <div class="row">
            <div class="span3">
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
            <div class="span9">
                <h2 class="page-header"><?=Yii::t('app', 'Мои предпочтения по аренде')?></h2>
                <?php $form = ActiveForm::begin([
                    'id' => 'profile-realty-form',
                    'options' => ['enctype' => 'multipart/form-data'],
                    'fieldConfig' => [
                        'template' => "{label}\n{input}\n{hint}\n{error}",
                    ],
                ]); ?>

                <div class="row">
                    <div class="span12">
                        <h3><strong>1.</strong> <span>Что ищем?</span></h3>
                        <div class="row">
                            <div class="span4">
                                <div class="property-type control-group">
                                    <div class="controls">
                                        <?= $form->field($modelRealtySearch, 'country_id')->dropDownList(Country::getDropDown()) ?>
                                    </div>
                                </div>
                            </div>
                            <div class="span6">
                                <div class="property-type control-group" style="margin-left: 0%;">
                                    <div class="controls">
                                        <?= $form->field($modelRealtySearch, 'city_id')->dropDownList(City::getDropDown()) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="span4">
                                <div class="contract-type control-group">
                                    <div class="controls">
                                        <?= $form->field($modelRealtySearch, 'type_housing_id')->dropDownList(TypeHousing::getDropDown()) ?>
                                    </div>
                                </div>
                            </div>
                            <div class="span6">
                                <div class="bedrooms control-group">
                                    <div class="controls">
                                        <?= $form->field($modelRealtySearch, 'places')->textInput() ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="span4">
                                <div class="bathrooms control-group">
                                    <div class="controls">
                                        <?= $form->field($modelRealtySearch, 'number_rooms')->textInput() ?>
                                    </div>
                                </div>
                            </div>
                            <div class="span6">
                                <div class="area control-group">
                                    <div class="controls">
                                        <?= $form->field($modelRealtySearch, 'footage')->textInput() ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="span4">
                                <div class="area control-group">
                                    <div class="controls">
                                        <?= $form->field($modelRealtySearch, 'price_from')->textInput() ?>
                                    </div>
                                </div>
                            </div>
                            <div class="span6">
                                <div class="price control-group">
                                    <div class="controls">
                                        <?= $form->field($modelRealtySearch, 'price_to')->textInput() ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="span4">
                        <h3><strong>2.</strong> <span>В квартире</span></h3>
                        <?= $form->field($modelRealtySearch, 'serviceDeviceIds')->checkboxList(DeviceService::getDropDown())->label('') ?>
                    </div>
                    <div class="span4">
                        <h3><strong>3.</strong> <span>Условия аренды</span></h3>
                        <?= $form->field($modelRealtySearch, 'termIds')->checkboxList(Term::getDropDown())->label('') ?>
                    </div>
                </div>
                <div class="row" style="text-align:center">
                    <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-large btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
