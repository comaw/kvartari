<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 30.06.2018
 * Time: 10:34
 */

use yii\bootstrap\Html;
use yii\helpers\Url;
use frontend\models\Realty;
use yii\bootstrap\ActiveForm;

/** @var $model \frontend\models\Realty */

$this->title                   = $model->title;
$this->params['breadcrumbs'][] = $model->title;
$this->registerMetaTag([
    'name' => 'description',
    'content' => $model->description ? mb_substr($model->description, 0, 160, Yii::$app->charset) : $model->title
]);
$this->registerMetaTag([
    'property' => 'og:image',
    'content' => isset($model->images[0]) ? $model->images[0]->getPhotoPath(Realty::IMAGE_NORMAL) : '/img/logo.png'
]);
?>
<div class="container">
    <div id="main">
        <div class="row">
            <div class="span9">
                <h1 class="page-header" style="margin:10px 0px"><?=$model->city->name . ', ' . $model->street?></h1>
                <div class="carousel property" style="position:relative">
                    <div class="electrolock-cont" style="display:none;">
                        <div class="electrolock-img-cont" style=" margin-left:15px">
                            <img src="/img/1min-marker.png" alt="electrolock">
                        </div>
                        <div class="electrolock-text-cont" style="text-align:center;margin-left:8px">Доступ в квартиру за 1 мин!<br>По паролю в SMS</div>
                    </div>

                    <div class="preview" style="height:350px;position:relative;z-index:4;">
                        <div class="price-cont">
                            <div class="price-text-cont" style="text-align:center;margin-left:8px">
                                 <span class="price-header-cont" style=" margin-left:15px">Цена:</span>
                                <?=Yii::$app->formatter->asDecimal($model->price)?> <span style="font-size:18px;font-weight:normal">руб/сутки</span>
                            </div>
                        </div>
                        <?=Html::img($model->images[0]->getPhotoPath(Realty::IMAGE_MAX), ['style' => 'max-height:350px; width:1000px', 'alt' => Html::encode($model->title)]); ?>
                    </div>
                    <div class="content">
                        <a class="carousel-prev" href="#">Назад</a>
                        <a class="carousel-next" href="#">Вперед</a>
                        <ul>
                            <li class="active">
                                <?=Html::img($model->images[0]->getPhotoPath(Realty::IMAGE_MAX), ['alt' => Html::encode($model->title)]); ?>
                            </li>
                            <?php foreach($model->images as $k => $image) { if ($k==0) {continue;} ?>
                                <li>
                                    <?=Html::img($image->getPhotoPath(Realty::IMAGE_MAX), ['alt' => Html::encode($image->title)]); ?>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="property-detail">
                    <div class="pull-left overview">
                        <div class="row">
                            <div class="span3">
                                <h2>Параметры</h2>
                                <table>
                                    <tr>
                                        <th>Цена:</th>
                                        <td><?=Yii::$app->formatter->asDecimal($model->price)?> руб.</td>
                                    </tr>
                                    <tr>
                                        <th>Размер залога:</th>
                                        <td><?=Yii::$app->formatter->asDecimal($model->pledge)?> руб.</td>
                                    </tr>
                                    <tr>
                                        <th>Спальных мест:</th>
                                        <td><?=$model->places?></td>
                                    </tr>
                                    <tr>
                                        <th>Площадь:</th>
                                        <td><?=$model->footage?>  м<sup>2</sup></td>
                                    </tr>
                                    <tr>
                                        <th>Кол-во комнат:</th>
                                        <td><?=$model->number_rooms?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div style="height:190px"><h2 style="margin:0px 0px 10px 0px; line-height:24px"><?=$model->title?></h2><p><?=nl2br($model->description)?></p></div>
                    <h2>Удобства:</h2>
                    <div class="row">
                        <ul class="span10">
                            <?php foreach($model->deviceServices as $k => $device){ ?>
                                <li style="display:inline-block; width:200px" class="checked">
                                    <?=$device->name?>
                                </li>
                                <?=((($k + 1) % 3) == 0) ? '<br>' : ''?>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php if (isset($model->terms[0])) { ?>
                        <h2>Условия аренды:</h2>
                        <div class="row">
                            <ul class="span10">
                                <?php foreach($model->terms as $k => $terms){ ?>
                                    <li style="display:inline-block; width:200px" class="checked">
                                        <?=$terms->name?>
                                    </li>
                                    <?=((($k + 1) % 3) == 0) ? '<br>' : ''?>
                                <?php } ?>
                            </ul>
                        </div>
                    <?php } ?>
                    <h2>Правила размещения:</h2>
                    <p><?=$model->laws ? nl2br($model->laws) : 'Стандартные' ?></p>
                    <h2>Карта</h2>
                    <div id="realty-map" style="width: 100%; height: 360px;"></div>
                </div>
            </div>
            <div class="sidebar span3">
                <div class="widget contact">
                    <div class="title">
                        <h2 class="block-title" style="margin:10px 0px">Забронировать</h2>
                    </div>
                    <div class="content" style="<?=Yii::$app->user->isGuest ? 'height:358px': 'height:228px'?>">
                        <?php $form = ActiveForm::begin(['id' => 'realty-reservation-form']); ?>
                        <input type="hidden" id="realty_id" value="<?=$model->id?>">
                        <div class="control-group">
                            <?php //echo $form->label($calendar,'date_from',array('style'=>'', 'class'=>'control-label')); ?>
                            <div class="controls">
<!--                                --><?php //$this->widget('zii.widgets.jui.CJuiDatePicker', array(
//                                    'name' => 'date_from',
//                                    'model' => $calendar,
//                                    'attribute' => 'date_from',
//                                    'language' => 'ru',
//                                    'options' => array(
//                                        'showAnim' => 'fade',
//                                        'minDate' =>"js: new Date()",
//                                        'beforeShowDay' => "js:function(date) {
//                                        var disabledDays = [\"".implode('","',$realty->getOffDays())."\"];
//                                        var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();
//                                        for (i = 0; i < disabledDays.length; i++) {
//                                            if($.inArray(y + '-' + (m+1) + '-' + d,disabledDays) != -1) {
//                                                //return [false];
//                                                return [true, 'ui-state-disabled ui-datepicker-unselectable', ''];
//                                            }
//                                        }
//                                        return [true];
//
//                                    }"
//                                    ),
//                                    'htmlOptions' => array(
//                                        'value'=>'',
//                                        'placeholder'=>'Дата заезда',
//                                        'style' => 'cursor:pointer;background: white; width:146px; height:32px',
//                                        'readonly' => 'true'
//                                    ),
//                                ));?>
                                <select id="time_from" name="Calendar[time_from]" style="width:78px">
<!--                                    --><?php //for($i=0; $i<24; $i++): ?>
<!--                                        <option value="--><?//=date('H:i',$i*3600-3*3600)?><!--" --><?//=($i==13?'selected':'')?><!-->--><?//=date('H:i',$i*3600-3*3600)?><!--</option>-->
<!--                                    --><?php //endfor; ?>
                                </select>
                                <?php // echo $form->error($calendar,'date_from'); ?>
                            </div>
                        </div>
                        <div class="control-group">
                            <!--<?php //echo $form->label($calendar,'date_to',array('style'=>'', 'class'=>'control-label')); ?>-->
                            <div class="controls">
<!--                                --><?php //$this->widget('zii.widgets.jui.CJuiDatePicker', array(
//                                    'name' => 'date_to',
//                                    'model' => $calendar,
//                                    'attribute' => 'date_to',
//                                    'language' => 'ru',
//                                    'options' => array(
//                                        'showAnim' => 'fade',
//                                        'minDate' =>"js: new Date()",
//                                    ),
//                                    'htmlOptions' => array(
//                                        'value'=>'',
//                                        'placeholder'=>'Дата выезда',
//                                        'style' => 'height:32px;cursor:pointer; background: white; width:146px;',
//                                        'readonly' => 'true'
//                                    ),
//                                ));?>
                                <?php //echo $form->error($calendar,'date_to'); ?>
                                <select id="time_to" name="Calendar[time_to]" style="width:78px">
<!--                                    --><?php //for($i=0; $i<24; $i++): ?>
<!--                                        <option value="--><?//=date('H:i',$i*3600-3*3600)?><!--" --><?//=($i==12?'selected':'')?><!-->--><?//=date('H:i',$i*3600-3*3600)?><!--</option>-->
<!--                                    --><?php //endfor; ?>
                                </select>
                            </div>
                        </div>
                        <hr style="margin:4px 0px">
                        <?php if(Yii::$app->user->isGuest):?>
                            <div class="control-group">
                                <?php //echo $form->label($user,'phone',array('style'=>'','class'=>'control-label')); ?>
                                <div class="controls">
                                    <?php //$this->widget('CMaskedTextField',array('model'=>$user,'attribute'=>'phone','mask'=>'+7?(999)999-99-99','htmlOptions'=> array('class'=>'','placeholder'=>'Введите телефон'))); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <?php //echo $form->label($user,'name',array('style'=>'','class'=>'control-label')); ?>
                                <div class="controls">
                                    <?php //echo $form->textField($user,'name',array('placeholder'=>'Имя')); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <?php //echo $form->label($user,'email',array('style'=>'','class'=>'control-label')); ?>
                                <div class="controls">
                                    <?php //echo $form->textField($user,'email',array('placeholder'=>'Email')); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="control-group">
                            <?php //echo $form->label($message,'text',array('style'=>'','class'=>'control-label','rows'=>5)); ?>
                            <div class="controls">
                                <?php //echo $form->textArea($message,'text',array('placeholder'=>'Комментарий','style'=>'height:54px')); ?>
                            </div>
                        </div>
                        <div style="margin:12px 0px">
                            Стоимость: <span id="priceCalculation"><?php //echo $realty->realPrice ?></span> руб. <div style="margin-left:72px;">+<?php //echo $realty->lock ?> руб. (залог)</div>
                        </div>
                        <input type="hidden" id="realty" value="<?php //echo $realty->id_realty ?>">
                        <div class="form-actions" style="text-align:center">
                            <?= Html::submitButton('Забронировать', ['class'=>'btn btn-primary arrow-right']); ?>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
                <?=\frontend\widgets\LastSeeRealty::widget()?>
            </div>
        </div>
    </div>
</div>
<?php
$apiKey = Yii::$app->params['mapApiKey'];
$lat = $model->latitude;
$lng = $model->longitude;
$script = <<< JS

    var map;
      function initialize() {
         var lat = {$lat};
         var lng = {$lng};
         console.log(lat, lng);
        var mapOptions = {
          zoom: 10,
          center: {lat: lat, lng: lng}
        };
        map = new google.maps.Map(document.getElementById('realty-map'), mapOptions);

        var marker = new google.maps.Marker({
          position: {lat: lat, lng: lng},
          map: map
        });

        var infowindow = new google.maps.InfoWindow({
          content: '<p>Marker Location:' + marker.getPosition() + '</p>'
        });

        google.maps.event.addListener(marker, 'click', function() {
          infowindow.open(map, marker);
        });
      }

      google.maps.event.addDomListener(window, 'load', initialize());
JS;

$this->registerJsFile('https://maps.googleapis.com/maps/api/js?key=' . Yii::$app->params['mapApiKey'],  ['position' => yii\web\View::POS_HEAD]);
$this->registerJs($script, yii\web\View::POS_END);
