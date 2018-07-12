<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?><?= $this->title ? ' - ' : '' ?><?= Html::encode(Yii::$app->name) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => Yii::t('app', 'Dashboard'), 'url' => ['/site/index']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => Yii::t('app','Login'), 'url' => ['/site/login']];
    } else {
        $menuItems[] = ['label' => Yii::t('app','Users'), 'url' => ['/user/index']];
        $menuItems[] = ['label' => Yii::t('app', 'Квартиры'), 'items' => [
            ['label' => Yii::t('app', 'Квартиры'), 'url' => ['/realty/index']],
            ['label' => Yii::t('app', 'Резервирвоание'), 'url' => ['/reservation/index']],

        ]];
        $menuItems[] = ['label' => Yii::t('app', 'Опции объявлений'), 'items' => [
            ['label' => Yii::t('app', 'Условия аренды'), 'url' => ['/term/index']],
            ['label' => Yii::t('app', 'Тип помощений'), 'url' => ['/typehousing/index']],
            ['label' => Yii::t('app', 'Комфорт'), 'url' => ['/deviceservice/index']],

        ]];
        $menuItems[] = ['label' => Yii::t('app', 'Локализация'), 'items' => [
            ['label' => Yii::t('app', 'Countries'), 'url' => ['/country/index']],
            ['label' => Yii::t('app', 'Cities'), 'url' => ['/city/index']],

        ]];
        $menuItems[] = ['label' => Yii::t('app', 'Услуги'), 'items' => [
            ['label' => Yii::t('app', 'Дополнительные услуги'), 'url' => ['/service/index']],

        ]];
        $menuItems[] = ['label' => Yii::t('app', 'Настройки'), 'items' => [
            ['label' => Yii::t('app', 'Настройки сайта'), 'url' => ['/sitesettings/index']],
            ['label' => Yii::t('app', 'Валюты сайта'), 'url' => ['/currency/index']],
            ['label' => Yii::t('app', 'Очистить кэш'), 'url' => ['/clear/cache']],

        ]];
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                Yii::t('app', 'Logout ({user})', ['user' => Yii::$app->user->identity->username]),
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>
<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
    </div>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
