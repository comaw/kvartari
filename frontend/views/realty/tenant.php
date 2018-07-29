<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 29.07.2018
 * Time: 16:32
 */

use yii\bootstrap\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use frontend\models\Realty;

/** @var $models \frontend\models\UserRealtySearch[] */
/** @var $model \frontend\models\UserRealtySearch */
/** @var $realty Realty */

$this->title                   = 'Поиск съемщика' . ($realty ? ' для "' . mb_substr($realty->title, 0, 60, Yii::$app->charset) . '"' : '');
$this->params['breadcrumbs'][] = $this->title;
$this->registerMetaTag([
    'name' => 'description',
    'content' => $this->title
]);
?>

<div class="container">
    <div id="main">
        <div class="row">
            <div class="span9">
                <h1 class="page-header"><?=$this->title?></h1>
                <div class="row">
                    <div class="span12">
                        <h2>Выберите квартиру</h2>
                        <?php $form = ActiveForm::begin([
                            'id' => 'search-tanante-form',
                            'method' => 'get',
                            'action' => Url::toRoute(['realty/tenant'])
                        ]); ?>
                        <?= Html::dropDownList('realty', Yii::$app->request->get('realty'),  Realty::getMyRealty()) ?>
                        <?= Html::submitButton(Yii::t('app', 'Искать'), ['class' => 'btn btn-primary arrow-right']) ?>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
                <?php if ($models) { ?>
                <div class="row">
                    <div class="span9">
                        <table class="table table-bordered table-striped'">
                            <thead>
                            <tr>
                                <th>Ф.И.О.</th>
                                <th>Цена от</th>
                                <th>Цена до</th>
                                <th> </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($models as $model) { ?>
                                <tr>
                                    <td><?=$model->user->username?></td>
                                    <td><?=$model->price_from?></td>
                                    <td><?=$model->price_to?></td>
                                    <td><a href="<?=Url::toRoute(['offer/add', 'offer' => $model->user->id, 'id' => $realty->id])?>" title="Сделать предложение" class="btn btn-primary">Сделать предложение</a></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="sidebar span3">
                <?=\frontend\widgets\Managers::widget()?>
            </div>
        </div>
    </div>
</div>
