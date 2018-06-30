<?php

/* @var $this yii\web\View */

$this->title = Yii::t('app', 'Новые квартиры');
$this->registerMetaTag([
    'name' => 'description',
    'content' => Yii::t('app', 'Новые квартиры')
]);
$this->registerMetaTag([
    'property' => 'og:image',
    'content' => '/img/logo.png'
]);
?>
<div class="map-wrapper">
    <div class="map">
        <div id="map-home" class="map-inner" style="height:380px"></div>
        <?=\frontend\widgets\HomeFormSearch::widget()?>
    </div>
</div>
<div class="container">
    <div id="main">
        <div class="row">
            <div class="span9">
                <?=\frontend\widgets\NewRealtyHome::widget()?>
            </div>
            <div class="sidebar span3">
                <?=\frontend\widgets\Managers::widget()?>
                <div class="hidden-tablet">
                    <?=\frontend\widgets\NewRealty::widget()?>
                </div>
            </div>
        </div>
        <?=\frontend\widgets\SpecialRealty::widget()?>
    </div>
</div>
<?=\frontend\widgets\HomePageLinks::widget()?>
<?php
$apiKey = Yii::$app->params['mapApiKey'];
$script = <<< JS
    var map;
      function initialize() {
        var lat = 60.0319640;
        var lng = 30.2786629;
        var mapOptions = {
          zoom: 10,
          center: {lat: lat, lng: lng}
        };
        map = new google.maps.Map(document.getElementById('map-home'), mapOptions);

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
        
        marker = new google.maps.Marker({
          position: {lat: 60.0419640, lng: 30.2686629},
          map: map
        });
        infowindow = new google.maps.InfoWindow({
          content: '<p>Marker Location:' + marker.getPosition() + '</p>'
        });
        
        google.maps.event.addListener(marker, 'click', function() {
          infowindow.open(map, marker);
        });
        
        marker = new google.maps.Marker({
          position: {lat: 60.0719640, lng: 30.1686629},
          map: map
        });
        infowindow = new google.maps.InfoWindow({
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
