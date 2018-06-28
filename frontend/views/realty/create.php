<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 24.06.2018
 * Time: 15:41
 */

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\helpers\Url;
use frontend\models\Country;
use frontend\models\City;
use frontend\models\TypeHousing;
use frontend\models\Service;
use frontend\models\DeviceService;

/** @var $model \frontend\models\Realty */

$this->title                   = Yii::t('app', 'Добавить недвижимость');
$this->params['breadcrumbs'][] = $this->title;
$this->registerMetaTag([
    'name' => 'description',
    'content' => $this->title
]);
?>
<div class="container">
    <div>
        <div id="main">
            <div class="list-your-property-form">
                <h2 class="page-header"><?=$this->title ?></h2>
                <div class="content">
                    <div class="row">
                        <div class="span8">
                            <p>Заполните карточку объекта, чтобы добавить свою недвижимость в каталог. Мы промодерируем вашу заявку и, если не возникнет никаких проблем, вскоре ваша недвижимость появится на сайте и будет доступна для аренды.</p>
                        </div>
                    </div>
                    <?php $form = ActiveForm::begin([
                            'id' => 'realty-form',
                            'options' => ['enctype' => 'multipart/form-data'],
                            'fieldConfig' => [
                                'template' => "{label}\n{input}\n{hint}\n{error}",
                            ],
                    ]); ?>
                    <div class="row">
                        <div class="span5">
                            <div class="row">
                                <div class="span5">
                                    <h3><strong>1.</strong> <span>Что сдаем?</span></h3>
                                    <div class="property-type control-group">
                                        <div class="controls">
                                            <?= $form->field($model, 'country_id')->dropDownList(Country::getDropDown()) ?>
                                        </div>
                                    </div>
                                    <div class="property-type control-group" style="margin-left: 4%;">
                                        <div class="controls">
                                            <?= $form->field($model, 'city_id')->dropDownList(City::getDropDown()) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group" style="float:left; width: 60%">
                                <div class="controls">
                                    <?= $form->field($model, 'street')->textInput() ?>
                                </div>
                            </div>
                            <div class="control-group" style="float:left; width: 11%; margin-left: 2%">
                                <div class="controls">
                                    <?= $form->field($model, 'house')->textInput() ?>
                                </div>
                            </div>
                            <div class="control-group" style="float:left; width: 11%; margin-left: 2%">
                                <div class="controls">
                                    <?= $form->field($model, 'housing')->textInput() ?>
                                </div>
                            </div>
                            <div class="control-group" style="float:left; width: 11%; margin-left: 3%">
                                <div class="controls">
                                    <?= $form->field($model, 'apartment')->textInput() ?>
                                </div>
                            </div>
                            <div class="contract-type control-group">
                                <div class="controls">
                                    <?= $form->field($model, 'type_housing_id')->dropDownList(TypeHousing::getDropDown()) ?>
                                </div>
                            </div>
                            <div class="bedrooms control-group">
                                <div class="controls">
                                    <?= $form->field($model, 'places')->textInput() ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="span5">
                                    <div class="bathrooms control-group">
                                        <div class="controls">
                                            <?= $form->field($model, 'number_rooms')->textInput() ?>
                                        </div>
                                    </div>
                                    <div class="area control-group">
                                        <div class="controls">
                                            <?= $form->field($model, 'footage')->textInput() ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="span5">
                                    <div class="area control-group">
                                        <div class="controls">
                                            <?= $form->field($model, 'pledge')->textInput() ?>
                                        </div>
                                    </div>
                                    <div class="price control-group">
                                        <div class="controls">
                                            <?= $form->field($model, 'price')->textInput() ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="span3">
                            <h3><strong>2.</strong> <span>Описание</span></h3>
                            <?= $form->field($model, 'title')->textInput(['placeholder'=>'Квартира в центре СПб с джакузи']) ?>
                            <?= $form->field($model, 'description')->textarea(['placeholder'=>'Описание квартиры','style'=>'height:160px'])->label('') ?>
                            <?= $form->field($model, 'laws')->textarea(['placeholder'=>'Правила проживания','style'=>'height:160px'])->label('') ?>
                        </div>
                        <div class="span4">
                            <h3><strong></strong> <span>Карта</span></h3>
                            <div id="map-create-realty" style="width:90%;height:360px"></div>
                            <?= $form->field($model, 'longitude')->hiddenInput()->label('') ?>
                            <?= $form->field($model, 'latitude')->hiddenInput()->label('') ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="span4">
                            <h3><strong>3.</strong> <span>В квартире</span></h3>
                            <?= $form->field($model, 'serviceDeviceIds')->checkboxList(DeviceService::getDropDown())->label('') ?>
                        </div>
                        <div class="span4">
                            <h3><strong>4.</strong> <span>Фотографии</span></h3>
                            <?= $form->field($model, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*'])->label('')->hint(Yii::t('app', 'Можно выбрать до 10 файлов за раз')) ?>
                        </div>
                        <div class="span4">
                            <h3><strong>5.</strong> <span>Вам требуются услуги?</span></h3>
                            <?= $form->field($model, 'servicesIds')->checkboxList(Service::getDropDownWithPrices())->label('') ?>
                        </div>
                    </div>
                    <div class="row" style="text-align:center">
                        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Отправить заявку') : Yii::t('app', 'Сохранить'), ['class' => 'btn btn-large btn-primary']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$apiKey = Yii::$app->params['mapApiKey'];
$script = <<< JS
    function loc() {
        var country = jQuery("#realty-country_id option:selected").text();
        var city = jQuery("#realty-city_id option:selected").text();
        var street = jQuery("#realty-street").val();
        var house = jQuery("#realty-house").val();
        var housing = jQuery("#realty-housing").val();
        if (!country || !city || !street) {
            return false;
        }
        var url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' + country + ' ' + city + ' ' + street + ' дом ' + house + ' корпус ' + housing + '&sensor=false&language=ru&key={$apiKey}';
        jQuery.getJSON(url).done(function(data) {
            if (data.status == 'OK') {
                var lat = data.results[0].geometry.location.lat || 60.0419640;
                var lng = data.results[0].geometry.location.lng || 30.2686629;
                jQuery("#realty-longitude").val(lng);
                jQuery("#realty-latitude").val(lat);
                initialize(lat, lng);
            }
        });
    }
    
    jQuery(document).on('blur','#realty-street, #realty-city_id, #realty-country_id, #realty-house, #realty-housing', function() {
        loc();
    });
    jQuery(document).on('change','#realty-city_id, #realty-country_id', function() {
        loc();
    });
        
   
    var map;
      function initialize(lat, lng) {
          if (!lat) {
              lat = 60.0419640;
          }
          if (!lng) {
              lng = 30.2686629;
          }
        var mapOptions = {
          zoom: 10,
          center: {lat: lat, lng: lng}
        };
        map = new google.maps.Map(document.getElementById('map-create-realty'),
            mapOptions);

        var marker = new google.maps.Marker({
          // The below line is equivalent to writing:
          // position: new google.maps.LatLng(-34.397, 150.644)
          position: {lat: lat, lng: lng},
          map: map
        });

        // You can use a LatLng literal in place of a google.maps.LatLng object when
        // creating the Marker object. Once the Marker object is instantiated, its
        // position will be available as a google.maps.LatLng object. In this case,
        // we retrieve the marker's position using the
        // google.maps.LatLng.getPosition() method.
        var infowindow = new google.maps.InfoWindow({
          content: '<p>Marker Location:' + marker.getPosition() + '</p>'
        });

        google.maps.event.addListener(marker, 'click', function() {
          infowindow.open(map, marker);
        });
      }

      google.maps.event.addDomListener(window, 'load', initialize(60.0419640, 30.268662));
JS;

$this->registerJsFile('https://maps.googleapis.com/maps/api/js?key=' . Yii::$app->params['mapApiKey'],  ['position' => yii\web\View::POS_HEAD]);
$this->registerJs($script, yii\web\View::POS_END);
