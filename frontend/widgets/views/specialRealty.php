<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 29.06.2018
 * Time: 13:57
 */

use frontend\models\Realty;
use yii\helpers\Url;
use yii\helpers\Html;

/** @var $models Realty[] */

?>
<div class="carousel">
    <h2 class="page-header">Специальные предложения</h2>
    <div class="content">
        <a class="carousel-prev" href="/realty/filterList/all">Пред.</a>
        <a class="carousel-next" href="/realty/filterList/all">След.</a>
        <ul>
            <?php foreach($models as $model){ ?>
            <li>
                <div class="image">
                    <?=Html::a('', ['realty/detail/', 'url' => $model->url], ['title' => Html::encode($model->title)])?>
                    <?php if (isset($model->images[0])) { ?>
                        <img src="<?=$model->images[0]->getPhotoPath(Realty::IMAGE_NORMAL)?>" alt="<?=Html::encode($model->title)?>" style="width:300px;height: 200px">
                    <?php } ?>
                </div>
                <div class="title">
                    <h3><?=Html::a(mb_substr($model->street, 0, '27', Yii::$app->charset).'...', ['realty/detail', 'url' => $model->url], ['title' => Html::encode($model->street), 'style'=>''])?></h3>
                </div>
                <div class="location">
                    <?=$model->country->name?>, <?=$model->city->name?>
                </div>
                <div class="price">
                    <?=Yii::$app->formatter->asDecimal($model->price)?> &#8381;
                </div>
                <div class="area">
                    <span class="key">Площадь:</span>
                    <span class="value"><?=$model->footage?> м<sup>2</sup></span>
                </div>
                <div class="bedrooms">
                    <div class="inner">
                        <?=$model->places?>
                    </div>
                </div>
            </li>
            <?php } ?>
        </ul>
    </div>
</div>
