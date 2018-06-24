<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */
/* @var $modelSignUp \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;

$this->title = Yii::t('app', 'Вход / Регистрация');
$this->params['breadcrumbs'][] = $this->title;
$this->registerMetaTag([
    'name' => 'description',
    'content' => $this->title
]);

?>
<div class="container">
    <div>
        <div id="main">
            <h1 class="page-header">Вход или регистрация</h1>
            <div class="login-register">
                <div class="row">
                    <div class="span5">
                        <ul class="tabs nav nav-tabs">
                            <li<?=(!$modelSignUp->hasErrors()) ? ' class="active"' : ''?>><a href="#login">Вход</a></li>
                            <li<?=($modelSignUp->hasErrors()) ? ' class="active"' : ''?>><a href="#register">Регистрация</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane <?=(!$modelSignUp->hasErrors()) ? 'active' : ''?>" id="login">
                                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                                <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class' => 'control-label', 'placeholder' => Yii::t('app', 'Введите телефон')])->widget(MaskedInput::class,[
                                    'name' => 'phone',
                                    'mask' => '+9(999)999-99-99'
                                ]) ?>

                                <?= $form->field($model, 'password')->passwordInput(['class' => 'control-label']) ?>

                                <?= $form->field($model, 'rememberMe', ['template' => '{label}\n{input}'])->checkbox(['labelOptions' => ['class' => ''], 'class' => 'ez-hide', 'placeholder' => Yii::t('app', 'Введите пароль')]) ?>

                                <div class="form-group">
                                    <?= Html::submitButton(Yii::t('app', 'Войти'), ['class' => 'btn btn-primary arrow-right']) ?>
                                </div>

                                <?php ActiveForm::end(); ?>
                            </div>
                            <div class="tab-pane <?=($modelSignUp->hasErrors()) ? 'active' : ''?>" id="register">
                                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                                <?= $form->field($modelSignUp, 'username')->textInput(['class' => 'control-label']) ?>

                                <?= $form->field($modelSignUp, 'phone')->widget(MaskedInput::class,[
                                    'name' => 'phone',
                                    'mask' => '+9(999)999-99-99'
                                ]) ?>

                                <?= $form->field($modelSignUp, 'email') ?>

                                <?= $form->field($modelSignUp, 'password')->passwordInput() ?>

                                <?= $form->field($modelSignUp, 'confirm')->passwordInput() ?>

                                <?= $form->field($modelSignUp, 'verifyCode')->widget(
                                    \common\recaptcha\ReCaptcha::className(),
                                    ['siteKey' => \common\recaptcha\ReCaptcha::SITE_KEY]
                                ) ?>

                                <div class="form-group">
                                    <?= Html::submitButton(Yii::t('app', 'Зарегистрироваться'), ['class' => 'btn btn-primary arrow-right', 'name' => 'yt1']) ?>
                                </div>

                                <?php ActiveForm::end(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="span7">
                        <h2 class="page-header">Почему работать с нами выгодно?</h2>
                        <div class="images row">
                            <div class="item span2">
                                <img src="/img/icons/circle-dollar.png" alt="">
                                <h3>Прибыльно</h3>
                            </div>
                            <div class="item span2">
                                <img src="/img/icons/circle-search.png" alt="">
                                <h3>Легко найти</h3>
                            </div>
                            <div class="item span2">
                                <img src="/img/icons/circle-global.png" alt="">
                                <h3>По всей России</h3>
                            </div>
                        </div>
                        <hr class="dotted">
                        <p>Квартари - уникальный сервис для владельцев квартир и арендаторов. Нам есть что предложить всем.</p>
                        <ul class="unstyled dotted">
                            <li>
								<span class="inner"><strong>Прибыльно</strong><br>Если вы ищете жилье для аренды, то у нас много выгодных и самых разнообразных предложений. Если же у вас есть квартира, которую вы хотите сдать и выжать максимум прибыли из нее, то едва ли найдется вариант более эффективный.</span>
                            </li>
                            <li>
								<span class="inner"><strong>Легко найти</strong><br>На нашем сайте огромное количество инструментов для поиска самых интересных предложений аренды. Вы можете выбирать по месту расположения, цене, всевозможным параметрам и т.д.
									<br>А владельцам квартир икать уже ничего не нужно. Мы сами ремонтируем, убираем, одним словом - заботимся о вашей недвижимости и ее содержимом. Любой вопрос решается одним звонком или сообщением.</span>
                            </li>
                            <li>
								<span class="inner"><strong>По всей России</strong><br>Не важно где ваша квартира, если вы владелец. Не важно, где вы хотите найти жилье, если вы арендатор. Мы работаем по всей России.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
