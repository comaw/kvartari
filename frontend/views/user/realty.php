<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 12.07.2018
 * Time: 00:03
 */

use frontend\models\Reservation;

/* @var $this yii\web\View */
/* @var $models[] \frontend\models\Realty */
/* @var $model \frontend\models\Reservation */

$this->title                   = Yii::t('app', 'Мои аренды');
$this->params['breadcrumbs'][] = $this->title;
$this->registerMetaTag([
    'name' => 'description',
    'content' => $this->title
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
                    <div class="span9">
                        <table class="table table-bordered table-striped'">
                            <thead>
                            <tr>
                                <th>Статус</th>
                                <th>Улица</th>
                                <th>Дом</th>
                                <th>Квартира</th>
                                <th>Цена</th>
                                <th>Залог</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($models as $model) { ?>
                                <tr>
                                    <td><?=Reservation::getStatusName($model->status)?></td>
                                    <td><?=$model->realty->street?></td>
                                    <td><?=$model->realty->house?></td>
                                    <td><?=$model->realty->apartment?></td>
                                    <td><?=Yii::$app->formatter->asDecimal($model->realty->price)?> руб.</td>
                                    <td><?=Yii::$app->formatter->asDecimal($model->realty->pledge)?> руб.</td>
                                    <td></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="sidebar span3">
                <?=\frontend\widgets\Managers::widget()?>
            </div>
        </div>
    </div>
</div>
