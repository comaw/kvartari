<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 29.06.2018
 * Time: 13:36
 */

use frontend\models\Realty;
use yii\helpers\Url;
use yii\helpers\Html;

/** @var $models Realty[] */

?>
<div class="widget properties last">
    <div class="title">
        <h2>Недавно просмотрены</h2>
    </div>
    <div class="content">
        <?php foreach($models as $model){ ?>
            <div class="property">
                <div class="image">
                    <?=Html::a('', ['realty/detail/', 'url' => $model->url], ['title' => Html::encode($model->title)])?>
                    <?php if (isset($model->images[0])) { ?>
                        <img src="<?=$model->images[0]->getPhotoPath(Realty::IMAGE_MINI)?>" alt="<?=Html::encode($model->title)?>" style="height:85px;width:100px;">
                    <?php } ?>
                </div>
                <div class="wrapper">
                    <div class="title">
                        <h3><?=Html::a(mb_substr($model->street, 0, '32', Yii::$app->charset).'...', ['realty/detail', 'url' => $model->url], ['title' => Html::encode($model->street), 'style'=>'font-size:12px; font-weight:bold'])?></h3>
                    </div>
                    <div class="location">
                        <?=$model->city->name?>
                    </div>
                    <div class="price">
                        <?=Yii::$app->formatter->asDecimal($model->price)?> руб/сутки
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
