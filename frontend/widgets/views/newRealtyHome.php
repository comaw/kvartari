<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 29.06.2018
 * Time: 13:16
 */

use frontend\models\Realty;
use yii\helpers\Url;
use yii\helpers\Html;

/** @var $models Realty[] */


?>
<h1 class="page-header">Новые квартиры</h1>
<div class="properties-grid">
    <div class="row" itemscope itemtype="http://schema.org/RealEstateAgent">
        <?php foreach($models as $model){ ?>
        <div class="property span3">
            <div class="image">
                <div class="content">
                    <?=Html::a('', ['realty/detail/', 'url' => $model->url], ['title' => Html::encode($model->title)])?>
                    <?php if (isset($model->images[0])) { ?>
                        <img itemprop="photo" src="<?=$model->images[0]->getPhotoPath(Realty::IMAGE_NORMAL)?>" alt="<?=Html::encode($model->title)?>" style="height:180px;width:270px;">
                    <?php } ?>
                </div>
                <div class="price" itemprop="priceRange">
                    <?=Yii::$app->formatter->asDecimal($model->price)?> руб.
                </div>
                <div class="reduced">
                    Свободно
                </div>
            </div>
            <div class="title">
                <h2><?=Html::a(mb_substr($model->street, 0, '27', Yii::$app->charset).'...', ['realty/detail/', 'url' => $model->url], ['title' => Html::encode($model->street), 'style'=>'font-size:14px; font-weight:bold', 'itemprop' => 'address'])?></h2>
            </div>
            <div class="location" itemprop="location">
                <?=$model->country->name?>, <?=$model->city->name?>
            </div>
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
        <?php } ?>
    </div>
</div>

