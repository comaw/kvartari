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

$this->title                   = 'Мои квартиры';
$this->params['breadcrumbs'][] = 'Мои квартиры';
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Мои квартиры'
]);
$this->registerMetaTag([
    'property' => 'og:image',
    'content' => '/img/logo.png'
]);

?>
<div class="container">
    <div id="main">
        <h1><?=$this->title?></h1>
        <div class="row" style="margin:12px 0px">
            <div class="span12">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th> </th>
                        <th>
                            Квартира
                        </th>
                        <th>
                            Статус
                        </th>
                        <th>
                            Дата подачи
                        </th>
                        <th>
                            Адрес
                        </th>
                        <th>
                            Управление
                        </th>
                    </tr>
                    <?php foreach($models as $model) { ?>
                        <tr>
                            <td>
                                <img src="<?=$model->images[0]->getPhotoPath(Realty::IMAGE_MINI)?>" alt="<?=Html::encode($model->title)?>" style="max-width: 100px; max-height: 100px;">
                            </td>
                            <td>
                                <?=$model->title?>
                            </td>
                            <td>
                                <?=$model->status->name?>
                            </td>
                            <td>
                                <?=$model->created?>
                            </td>
                            <td>
                                <?=$model->country->name?>, <?=$model->city->name?>,
                                <br><?=$model->street?> <?=$model->house?>
                                <?php if ($model->housing) { ?>, Корп. <?=$model->housing?><?php } ?>
                                <?php if ($model->apartment) { ?>, Квартира <?=$model->apartment?><?php } ?>
                            </td>
                            <td>
                                <a href="<?=Url::toRoute(['realty/detail', 'url' => $model->url])?>" target="_blank" title="Посмотреть объявление">Просмотр</a><br>
                                <a href="" title="Редактировать">Редактировать</a><br>
                                <a href="" title="Удалить объявление" onclick="return confirm('Вы уверены, что хотите удалить объявление? Восстановить его будет не возможно!');">Удалить</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
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
</div>
