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
/** @var $reservation \frontend\widgets\Reservation */
/** @var $reserv \frontend\widgets\Reservation */
/** @var $reservations[] \frontend\widgets\Reservation */

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
                    <div class="electrolock-cont" style="<?=isset($model->reservation->id) ? '' : 'display:none;'?>">
                        <div class="electrolock-img-cont">

                        </div>
                        <div class="electrolock-text-cont">Сегодня<br>занято</div>
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
                    <?php if ($reservations) { ?>
                    <h2>Зарезервированные периоды:</h2>
                    <div class="row">
                        <ul class="span10">
                            <?php if (Yii::$app->user->isGuest) { ?>
                                <p>Только зарегистрированные пользователи могут видеть зарезервированные периоды</p>
                            <?php } else { ?>
                                <?php foreach($reservations as $k => $reserv){ ?>
                                    <li style="display:block; width:200px">
                                        С <?=Yii::$app->formatter->asDate($reserv->date_from)?> - по <?=Yii::$app->formatter->asDate($reserv->date_to)?>
                                    </li>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php } ?>
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
                    <div class="content" style="<?=Yii::$app->user->isGuest ? 'height:365px': 'height:275px'?>">
                        <?=\frontend\widgets\Reservation::widget(['realty' => $model, 'reservation' => $reservation])?>
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
