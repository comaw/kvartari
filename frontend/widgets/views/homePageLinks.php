<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 29.06.2018
 * Time: 10:10
 */

use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="bottom-wrapper">
    <div class="bottom container">
        <div class="bottom-inner row">
            <div class="item span4">
                <div class="address decoration"></div>
                <h2><a>Сдавайте квартиры</a></h2>
                <p>
                    Теперь можно зарабатывать на аренде квартир без потери времени и головной боли. Просто добавьте ее в наш сервис
                </p>
                <a href="<?=Url::toRoute(['article/view', 'url' => 'rent'])?>" class="btn btn-primary" title="Сдавайте квартиры">Читать дальше</a>
            </div>
            <div class="item span4">
                <div class="gps decoration"></div>
                <h2><a>Выгодные предложения</a></h2>
                <p>
                    Мы помогаем заработать владельцам квартир, а арендаторам найти наиболее удобные для них предложения
                </p>
                <a href="<?=Url::toRoute(['article/view', 'url' => 'moneygreat'])?>" class="btn btn-primary" title="Выгодные предложения">Читать дальше</a>
            </div>
            <div class="item span4">
                <div class="key decoration"></div>
                <h2><a>Безопасность</a></h2>
                <p>
                    Наш сервис работает только с проверенными арендаторами и владельцами. Все квартиры проходят обязательную модерацию
                </p>
                <a href="<?=Url::toRoute(['article/view', 'url' => 'safety'])?>" class="btn btn-primary" title="Безопасность">Читать дальше</a>
            </div>
        </div>
    </div>
</div>
