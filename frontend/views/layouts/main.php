<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="/css/favicon.png" type="image/png">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?><?= $this->title ? ' - ' : '' ?><?= Html::encode(Yii::$app->name) ?></title>
    <?php $this->head() ?>

    <link rel="shortcut icon" href="/img/favicon.png" type="image/png">
</head>
<body>
<?php $this->beginBody() ?>
<div id="wrapper-outer" >
    <div id="wrapper">
        <div id="wrapper-inner">
            <div class="breadcrumb-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="span12">
                            <ul class="breadcrumb pull-left">
                                <li>
                                    <?= Breadcrumbs::widget([
                                        'homeLink' => ['label' => Yii::t('app', 'Главная'), 'url' => '/'],
                                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                                    ]) ?>
                                </li>
                            </ul>
                            <?=\frontend\widgets\BreadcrumbMenu::widget()?>
                        </div>
                    </div>
                </div>
            </div>
            <?=\frontend\widgets\Top::widget()?>
            <?=\frontend\widgets\TopMenu::widget()?>
            <div id="content">
                <?= Alert::widget() ?>
                <?=$content?>
            </div>
        </div>
        <?=\frontend\widgets\Footer::widget()?>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
