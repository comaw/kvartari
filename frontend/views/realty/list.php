<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 30.06.2018
 * Time: 11:45
 */

use common\lib\LinkPager;
use yii\bootstrap\Html;
use yii\helpers\Url;
use frontend\models\Realty;
use yii\bootstrap\ActiveForm;

/** @var $models \frontend\models\Realty[] */
/** @var $pages \common\lib\Pagination */

$this->title                   = 'Недвижимость доступна для аренды';
$this->params['breadcrumbs'][] = 'Недвижимость доступна для аренды';
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Недвижимость доступна для аренды'
]);
$this->registerMetaTag([
    'property' => 'og:image',
    'content' => '/img/logo.png'
]);

?>
<div class="container">
    <div id="main">
        <div class="row">
            <div class="span9">
                <h1 class="page-header"><?=$this->title?></h1>
                <div class="row">
                    <div class="properties-rows">
                        <?php foreach ($models as $model) { ?>
                            <div class="property span9">
                                <div class="row">
                                    <div class="image span3">
                                        <div class="content">
                                            <div class="electrolock-cont" style="display:none;">
                                                <div class="electrolock-img-cont">
                                                    <img src="/img/1min-marker.png">
                                                </div>
                                                <div class="electrolock-text-cont">Доступ <br>за минуту!</div>
                                            </div>
                                            <div class="electrolock-cont" style="<?=isset($model->reservation->id) ? '' : 'display:none;'?>">
                                                <div class="electrolock-img-cont">

                                                </div>
                                                <div class="electrolock-text-cont">Сегодня<br>занято</div>
                                            </div>
                                            <?=Html::a('', ['realty/detail', 'url' => $model->url], ['title' => Html::encode($model->street)]) ?>
                                            <img src="<?=$model->images[0]->getPhotoPath(Realty::IMAGE_NORMAL)?>" alt="<?=Html::encode($model->title)?>" style="width:270px; height:180px">
                                        </div>
                                    </div>
                                    <div class="body span6">
                                        <div class="title-price row">
                                            <div class="title span4">
                                                <h2><?=Html::a($model->street, ['realty/detail', 'url' => $model->url], ['title' => Html::encode($model->street)]) ?></h2>
                                            </div>
                                            <div class="price">
                                                <?=Yii::$app->formatter->asDecimal($model->price)?> руб.
                                            </div>
                                        </div>

                                        <div class="location">
                                            <?=$model->city->name?>
                                        </div>
                                        <p>
                                            <?=mb_substr($model->description, 0, 171, Yii::$app->charset).'...'?>
                                        </p>
                                        <div class="area">
                                            <span class="key">Площадь:</span>
                                            <span class="value"><?=$model->footage?> м<sup>2</sup></span>
                                        </div>
                                        <div class="bedrooms">
                                            <div class="content">
                                                <?=$model->places?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="pager">
                    <?php
                    echo LinkPager::widget([
                        'pagination' => $pages,
                    ]);
                    ?>
                </div>
            </div>
            <div class="sidebar span3">
                <div style="margin: 360px 0 0 0 !important;">
                    <?=\frontend\widgets\HomeFormSearch::widget()?>
                </div>
                <?=\frontend\widgets\Managers::widget()?>
            </div>
        </div>
    </div>
</div>
