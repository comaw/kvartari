<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 19.06.2018
 * Time: 00:38
 */

/** @var $models Realty[] */

use frontend\models\Realty;
use yii\helpers\Url;
use yii\helpers\Html;

?>
<div id="footer-wrapper">
    <div id="footer-top">
        <div id="footer-top-inner" class="container">
            <div class="row">
                <div class="widget properties span3">
                    <div class="title">
                        <h2>Сейчас просматривают</h2>
                    </div>
                    <div class="content">
                        <?php foreach($models as $model){ ?>
                            <div class="property">
                                <div class="image">
                                    <?=Html::a('', ['realty/detail', 'url' => $model->url], ['title' => Html::encode($model->title)])?>
                                    <?php if (isset($model->images[0])) { ?>
                                    <img src="<?=$model->images[0]->getPhotoPath(Realty::IMAGE_MINI)?>" alt="<?=Html::encode($model->title)?>" style="width:100px;height:74px">
                                    <?php } ?>
                                </div>
                                <div class="wrapper">
                                    <div class="title">
                                        <h3><?=Html::a(mb_substr($model->title, 0, 15, Yii::$app->charset) . '...', ['realty/detail', 'url' => $model->url], ['title' => Html::encode($model->title)])?></h3>
                                    </div>
                                    <div class="location">
                                        <?=$model->country->name?>, <?=$model->city->name?>
                                    </div>
                                    <div class="price">
                                        <?=Yii::$app->formatter->asDecimal($model->price)?> руб.
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="widget span3">
                    <div class="title">
                        <h2>Контакты</h2>
                    </div>
                    <div class="content">
                        <table class="contact">
                            <tbody>
                            <tr>
                                <th class="address">Адрес:</th>
                                <td>
                                    Санкт-Петербург<br>Россия<br>
                                </td>
                            </tr>
                            <tr>
                                <th class="phone">Телефон:</th>
                                <td>+7 (800) 555-23-27</td>
                            </tr>
                            <tr>
                                <th class="email">E-mail:</th>
                                <td><a href="mailto:info@kvartari.ru">info@kvartari.ru</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="widget span3">
                    <div class="title">
                        <h2 class="block-title">Полезные ссылки</h2>
                    </div>

                    <div class="content">
                        <ul class="menu nav">
                            <li class="first leaf">
                                <a href="<?=Url::toRoute(['article/view', 'url' => 'news'])?>" title="Новости сервиса">Новости сервиса</a>
                            </li>
                            <li class="leaf">
                                <a href="<?=Url::toRoute(['article/view', 'url' => 'about'])?>" title="О нас">О нас</a>
                            </li>
                            <li class="leaf">
                                <a href="<?=Url::toRoute(['article/view', 'url' => 'contact'])?>" title="Связаться с нами">Связаться с нами</a>
                            </li>
                            <li class="leaf">
                                <a href="<?=Url::toRoute(['article/view', 'url' => 'faq'])?>" title="Вопрос-Ответ">Вопрос-Ответ</a>
                            </li>
                            <li class="leaf">
                                <a href="<?=Url::toRoute(['article/view', 'url' => 'rules'])?>" title="Как мы работаем">Как мы работаем</a>
                            </li>
                            <li class="leaf">
                                <a href="<?=Url::toRoute(['article/view', 'url' => 'who-we-are'])?>" title="Наши менеджеры">Наши менеджеры</a>
                            </li>
                            <li class="last leaf">
                                <a href="<?=Url::toRoute(['article/view', 'url' => 'fast-access'])?>" title="Кодовые замки">Кодовые замки</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="widget span3">
                    <div class="title">
                        <h2 class="block-title">Напишите нам!</h2>
                    </div>
                    <div class="content">
                        <form method="post" action="/site/sendEmail">
                            <div class="control-group">
                                <label class="control-label" for="inputName"> Имя <span class="form-required" title="This field is required.">*</span> </label>
                                <div class="controls">
                                    <input type="text" id="inputName" name="name">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputEmail"> Ваш Email <span class="form-required" title="This field is required.">*</span> </label>
                                <div class="controls">
                                    <input type="text" id="inputEmail" name="email">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputMessage"> Текст <span class="form-required" title="This field is required.">*</span> </label>
                                <div class="controls">
                                    <textarea id="inputMessage" name="text"></textarea>
                                </div>
                            </div>
                            <div class="form-actions">
                                <input type="submit" class="btn btn-primary arrow-right" value="Отправить">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="footer" class="footer container">
        <div id="footer-inner">
            <div class="row">
                <div class="span6 copyright">
                    <p>
                        © <?=date('Y')?> <a href="http://kvartari.ru" title="Kvartari.ru">Kvartari.ru</a>. Все права защищены.
                    </p>
                </div>
                <div style="height: 0px; width: 1px; overflow: hidden;">
                    <!--LiveInternet counter-->
                    <script type="text/javascript">
                        //<!--
                        document.write("<a href='http://www.liveinternet.ru/click' " + "target=_blank><img src='http://counter.yadro.ru/hit?t14.1;r" + escape(document.referrer) + (( typeof (screen) == "undefined") ? "" : ";s" + screen.width + "*" + screen.height + "*" + (screen.colorDepth ? screen.colorDepth : screen.pixelDepth)) + ";u" + escape(document.URL) + ";" + Math.random() + "' alt='' title='LiveInternet: показано число просмотров за 24" + " часа, посетителей за 24 часа и за сегодня' " + "border=0 width=88 height=31><\/a>");
                        //-->
                    </script>
                    <!--/LiveInternet-->
                </div>
            </div>
        </div>
    </div>
</div>
