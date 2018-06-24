<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 19.06.2018
 * Time: 00:31
 */

use yii\helpers\Url;

?>
<div class="account pull-right">
    <ul class="nav nav-pills">
        <?php if (Yii::$app->user->isGuest) { ?>
        <li>
            <a href="<?=Url::toRoute(['site/login'])?>" title="Вход / Регистрация">Вход / Регистрация</a>
        </li>
        <?php } ?>
		<?php if (!Yii::$app->user->isGuest) { ?>
        <li>
            <a href="/user/orders">Мои аренды</a>
        </li>
        <li>
            <a href="/realty/clientRealty">Мои квартиры</a>
        </li>
        <li>
            <a href="/realty/calendar">Календарь занятости</a>
        </li>
        <li>
            <a href="<?=Url::toRoute(['user/profile'])?>" title="Профиль">Профиль</a>
        </li>
        <li>
            <a href="<?=Url::toRoute(['site/logout'])?>" title="Выйти">Выйти</a>
        </li>
        <?php } ?>
    </ul>
</div>
