<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 19.06.2018
 * Time: 00:38
 */

?>

<div id="footer-wrapper">
    <div id="footer-top">
        <div id="footer-top-inner" class="container">
            <div class="row">
                <div class="widget properties span3">
                    <div class="title">
                        <h2>Сейчас просматривают</h2>
                    </div><!-- /.title -->

                    <div class="content">
                        <?php
                        $viewing = []; // Realty::model()->findAll(array('order'=>'RAND()','limit'=>3));
                        foreach($viewing as $v){ ?>
                            <div class="property">
                                <div class="image">
                                    <?=CHtml::link('',array('realty/detail','id'=>$v->id_realty))?>
                                    <img src="<?=$v->flatphotos[0]->getPhotoPath()?>" alt="" style="width:100px;height:74px">
                                </div><!-- /.image -->
                                <div class="wrapper">
                                    <div class="title">
                                        <h3><?=CHtml::link(mb_substr($v->name,0,15,"UTF-8").'...',array('realty/detail','id'=>$v->id_realty))?></h3>
                                    </div><!-- /.title -->
                                    <div class="location">
                                        Россия, Санкт-Петербург
                                    </div><!-- /.location -->
                                    <div class="price">
                                        <?=$v->price?> руб.
                                    </div><!-- /.price -->
                                </div><!-- /.wrapper -->
                            </div><!-- /.property -->
                        <?php	}
                        ?>
                    </div><!-- /.content -->
                </div><!-- /.properties-small -->

                <div class="widget span3">
                    <div class="title">
                        <h2>Контакты</h2>
                    </div><!-- /.title -->

                    <div class="content">
                        <table class="contact">
                            <tbody>
                            <tr>
                                <th class="address">Адрес:</th>
                                <td>
                                    Санкт-Петербург
                                    <br>
                                    Россия
                                    <br>
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
                    </div><!-- /.content -->
                </div><!-- /.widget -->

                <!--<div class="widget span3">
                    <div class="title">
                        <h2 class="block-title">Полезные ссылки</h2>
                    </div>

                    <div class="content">
                        <ul class="menu nav">
                            <li class="first leaf">
                                <a href="/articles/news">Новости сервиса</a>
                            </li>
                            <li class="leaf">
                                <a href="/articles/about">О нас</a>
                            </li>
                            <li class="leaf">
                                <a href="/articles/contact">Связаться с нами</a>
                            </li>
                            <li class="leaf">
                                <a href="/articles/faq">Вопрос-Ответ</a>
                            </li>
                            <li class="leaf">
                                <a href="/articles/rules">Как мы работаем</a>
                            </li>
                            <li class="leaf">
                                <a href="/articles/who_we_are">Наши менеджеры</a>
                            </li>
                            <li class="last leaf">
                                <a href="/articles/fast_access">Кодовые замки</a>
                            </li>
                        </ul>
                    </div>
                </div><!-- /.widget -->

                <div class="widget span3">
                    <div class="title">
                        <h2 class="block-title">Напишите нам!</h2>
                    </div><!-- /.title -->

                    <div class="content">
                        <form method="post" action="/site/sendEmail">
                            <div class="control-group">
                                <label class="control-label" for="inputName"> Имя <span class="form-required" title="This field is required.">*</span> </label>
                                <div class="controls">
                                    <input type="text" id="inputName" name="name">
                                </div><!-- /.controls -->
                            </div><!-- /.control-group -->

                            <div class="control-group">
                                <label class="control-label" for="inputEmail"> Ваш Email <span class="form-required" title="This field is required.">*</span> </label>
                                <div class="controls">
                                    <input type="text" id="inputEmail" name="email">
                                </div><!-- /.controls -->
                            </div><!-- /.control-group -->

                            <div class="control-group">
                                <label class="control-label" for="inputMessage"> Текст <span class="form-required" title="This field is required.">*</span> </label>

                                <div class="controls">
                                    <textarea id="inputMessage" name="text"></textarea>
                                </div><!-- /.controls -->
                            </div><!-- /.control-group -->

                            <div class="form-actions">
                                <input type="submit" class="btn btn-primary arrow-right" value="Отправить">
                            </div><!-- /.form-actions -->
                        </form>
                    </div><!-- /.content -->
                </div><!-- /.widget -->
            </div><!-- /.row -->
        </div><!-- /#footer-top-inner -->
    </div><!-- /#footer-top -->

    <div id="footer" class="footer container">
        <div id="footer-inner">
            <div class="row">
                <div class="span6 copyright">
                    <p>
                        © <?=date('Y')?> <a href="http://kvartari.ru" title="Kvartari.ru">Kvartari.ru</a>. Все права защищены.
                    </p>
                </div><!-- /.copyright -->
                <div style="height: 0px; width: 1px; overflow: hidden;">

                    <!--LiveInternet counter-->
                    <script type="text/javascript">
                        //<!--
                        document.write("<a href='http://www.liveinternet.ru/click' " + "target=_blank><img src='http://counter.yadro.ru/hit?t14.1;r" + escape(document.referrer) + (( typeof (screen) == "undefined") ? "" : ";s" + screen.width + "*" + screen.height + "*" + (screen.colorDepth ? screen.colorDepth : screen.pixelDepth)) + ";u" + escape(document.URL) + ";" + Math.random() + "' alt='' title='LiveInternet: показано число просмотров за 24" + " часа, посетителей за 24 часа и за сегодня' " + "border=0 width=88 height=31><\/a>");
                        //-->
                    </script>
                    <!--/LiveInternet-->
                </div>
                <!--<div class="span6 share">
                    <div class="content">
                        <ul class="menu nav">
                            <li class="first leaf">
                                <a href="http://www.facebook.com/kvartari" class="facebook">Facebook</a>
                            </li>
                            <li class="leaf">
                                <a href="http://flickr.net/kvartari" class="flickr">Flickr</a>
                            </li>
                            <li class="leaf">
                                <a href="http://plus.google.com/kvartari" class="google">Google+</a>
                            </li>
                            <li class="leaf">
                                <a href="http://www.twitter.com/kvartari" class="twitter">Twitter</a>
                            </li>
                            <li class="last leaf">
                                <a href="http://www.vimeo.com/kvartari" class="vimeo">Vimeo</a>
                            </li>
                        </ul>
                    </div>
                </div><!-- /.span6 -->
            </div><!-- /.row -->
        </div><!-- /#footer-inner -->
    </div><!-- /#footer -->
</div><!-- /#footer-wrapper -->
