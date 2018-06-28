<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 24.06.2018
 * Time: 15:41
 */

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\helpers\Url;
use frontend\models\Country;
use frontend\models\City;
use frontend\models\TypeHousing;
use frontend\models\Service;
use frontend\models\DeviceService;

/** @var $model \frontend\models\Realty */

$this->title                   = Yii::t('app', 'Добавить недвижимость');
$this->params['breadcrumbs'][] = $this->title;
$this->registerMetaTag([
    'name' => 'description',
    'content' => $this->title
]);
?>
<div class="container">
    <div>
        <div id="main">
            <div class="list-your-property-form">
                <h2 class="page-header"><?=$this->title ?></h2>
                <div class="content">
                    <div class="row">
                        <div class="span8">
                            <p>Заполните карточку объекта, чтобы добавить свою недвижимость в каталог. Мы промодерируем вашу заявку и, если не возникнет никаких проблем, вскоре ваша недвижимость появится на сайте и будет доступна для аренды.</p>
                        </div>
                    </div>
                    <?php $form = ActiveForm::begin([
                            'id' => 'realty-form',
                            'options' => ['enctype' => 'multipart/form-data'],
                            'fieldConfig' => [
                                'template' => "{label}\n{input}\n{hint}\n{error}",
                            ],
                    ]); ?>
                    <div class="row">
                        <div class="span5">
                            <div class="row">
                                <div class="span5">
                                    <h3><strong>1.</strong> <span>Что сдаем?</span></h3>
                                    <div class="property-type control-group">
                                        <div class="controls">
                                            <?= $form->field($model, 'country_id')->dropDownList(Country::getDropDown()) ?>
                                        </div>
                                    </div>
                                    <div class="property-type control-group" style="margin-left: 4%;">
                                        <div class="controls">
                                            <?= $form->field($model, 'city_id')->dropDownList(City::getDropDown()) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group" style="float:left; width: 60%">
                                <div class="controls">
                                    <?= $form->field($model, 'street')->textInput() ?>
                                </div>
                            </div>
                            <div class="control-group" style="float:left; width: 11%; margin-left: 2%">
                                <div class="controls">
                                    <?= $form->field($model, 'house')->textInput() ?>
                                </div>
                            </div>
                            <div class="control-group" style="float:left; width: 11%; margin-left: 2%">
                                <div class="controls">
                                    <?= $form->field($model, 'housing')->textInput() ?>
                                </div>
                            </div>
                            <div class="control-group" style="float:left; width: 11%; margin-left: 3%">
                                <div class="controls">
                                    <?= $form->field($model, 'apartment')->textInput() ?>
                                </div>
                            </div>
                            <div class="contract-type control-group">
                                <div class="controls">
                                    <?= $form->field($model, 'type_housing_id')->dropDownList(TypeHousing::getDropDown()) ?>
                                </div>
                            </div>
                            <div class="bedrooms control-group">
                                <div class="controls">
                                    <?= $form->field($model, 'places')->textInput() ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="span5">
                                    <div class="bathrooms control-group">
                                        <div class="controls">
                                            <?= $form->field($model, 'number_rooms')->textInput() ?>
                                        </div>
                                    </div>
                                    <div class="area control-group">
                                        <div class="controls">
                                            <?= $form->field($model, 'footage')->textInput() ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="span5">
                                    <div class="area control-group">
                                        <div class="controls">
                                            <?= $form->field($model, 'pledge')->textInput() ?>
                                        </div>
                                    </div>
                                    <div class="price control-group">
                                        <div class="controls">
                                            <?= $form->field($model, 'price')->textInput() ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="span3">
                            <h3><strong>2.</strong> <span>Описание</span></h3>
                            <?= $form->field($model, 'title')->textInput(['placeholder'=>'Квартира в центре СПб с джакузи']) ?>
                            <?= $form->field($model, 'description')->textarea(['placeholder'=>'Описание квартиры','style'=>'height:160px'])->label('') ?>
                            <?= $form->field($model, 'laws')->textarea(['placeholder'=>'Правила проживания','style'=>'height:160px'])->label('') ?>
                        </div>
                        <div class="span4">
                            <h3><strong></strong> <span>Карта</span></h3>
                            <div id="mapq" style="width:90%;height:360px"></div>
                            <?= $form->field($model, 'longitude')->hiddenInput()->label('') ?>
                            <?= $form->field($model, 'latitude')->hiddenInput()->label('') ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="span4">
                            <h3><strong>3.</strong> <span>В квартире</span></h3>
                            <?= $form->field($model, 'serviceDeviceIds')->checkboxList(DeviceService::getDropDown())->label('') ?>
                        </div>
                        <div class="span4">
                            <h3><strong>4.</strong> <span>Фотографии</span></h3>
                            <?= $form->field($model, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*'])->label('')->hint(Yii::t('app', 'Можно выбрать до 10 файлов за раз')) ?>
                        </div>
                        <div class="span4">
                            <h3><strong>5.</strong> <span>Вам требуются услуги?</span></h3>
                            <?= $form->field($model, 'servicesIds')->checkboxList(Service::getDropDownWithPrices())->label('') ?>
                        </div>
                    </div>
                    <div class="row" style="text-align:center">
                        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Отправить заявку') : Yii::t('app', 'Сохранить'), ['class' => 'btn btn-large btn-primary']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
