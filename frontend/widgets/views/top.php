<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 19.06.2018
 * Time: 00:35
 */

use yii\helpers\Url;
use yii\helpers\Html;
use frontend\models\SiteSettings;

?>
<div id="header-wrapper">
    <div id="header">
        <div id="header-inner">
            <div class="container">
                <div class="navbar">
                    <div class="navbar-inner">
                        <div class="row">
                            <div class="logo-wrapper span4">
                                <a href="#nav" class="hidden-desktop" id="btn-nav">Toggle navigation</a>
                                <div class="logo">
                                    <a href="<?=Url::home()?>" title="Kvartari.ru"><img src="/img/logo.png" alt="Kvartari.ru"></a>
                                </div>
                                <div class="site-name">
                                    <a href="<?=Url::home()?>" title="Kvartari.ru" class="brand">Kvartari.ru</a>
                                </div>
                                <div class="site-slogan">
									<span>Аренда квартир <br>с доступом за минуту</span>
                                </div>
                            </div>
                            <div class="info">
                                <div class="site-phone">
                                    <span><?=SiteSettings::getSettings('site_phone')?></span>
                                </div>
                                <div class="site-email">
                                    <a href="mailto:<?=SiteSettings::getSettings('site_email')?>"><?=SiteSettings::getSettings('site_email')?></a>
                                </div>
                            </div>
                            <?=Html::a(Yii::t('app', 'Добавить квартиру'), ['realty/create'], ['class'=>'btn btn-primary btn-large list-your-property arrow-right'])?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
