<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 29.06.2018
 * Time: 12:50
 */

use frontend\models\Country;
use frontend\models\City;
use frontend\models\TypeHousing;
use frontend\models\FormSearch;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\helpers\Url;

/** @var $model \frontend\models\FormSearch */

?>
<div class="container">
    <div class="row">
        <div class="span3" style="margin-top:-335px">
            <div class="property-filter pull-right">
                <div class="content">
                    <?php $form = ActiveForm::begin([
                        'id' => 'search-home-form',
                        'method' => 'get',
                        'action' => Url::toRoute(['realty/search'])
                    ]); ?>
                        <div class="location control-group" style="margin-bottom:18px">
                            <div class="controls">
                                <?= $form->field($model, 'country')->dropDownList(Country::getDropDown())->label('') ?>
                            </div>
                        </div>
                        <div class="type control-group" style="margin-bottom:18px">
                            <div class="controls">
                                <?= $form->field($model, 'city')->dropDownList(City::getDropDown())->label('') ?>
                            </div>
                        </div>
                        <div class="type control-group">
                            <div class="controls">
                                <?= $form->field($model, 'type_housing_id')->dropDownList(TypeHousing::getDropDown())->label('') ?>
                             </div>
                        </div>

                        <div class="type control-group">
                            <label class="control-label" for="inputBeds"> Цена от </label>
                            <div class="controls">
                                <?= $form->field($model, 'price_from')->textInput()->label('') ?>
                            </div>
                        </div>
                        <div class="type control-group">
                            <label class="control-label" for="inputBeds"> Цена до </label>
                            <div class="controls">
                                <?= $form->field($model, 'price_to')->textInput()->label('') ?>
                            </div>
                        </div>

                        <div class="form-actions">
                            <?= Html::submitButton(Yii::t('app', ' Найти! '), ['class' => 'btn btn-primary btn-large']) ?>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
