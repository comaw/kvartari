<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 19.06.2018
 * Time: 00:36
 */

?>
<!-- NAVIGATION -->
<div id="navigation">
    <div class="container">
        <div class="navigation-wrapper">
            <div class="navigation clearfix-normal">

                <ul class="nav">
                    <li>
                        <a href="/">Главная</a>
                    </li>
                    <li class="menuparent">
                        <span class="menuparent nolink">Аренда</span>
                        <ul>
                            <li>
                                <a href="/realty/filterList/code">Доступ за 1 минуту</a>
                            </li>
                            <li>
                                <a href="/realty/filterList/2000">Квартиры до 2000руб/сутки</a>
                            </li>
                            <li>
                                <a href="/realty/filterList/metro">Только рядом с метро</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="/articles/faq">Частые вопросы</a>
                    </li>
                    <!-- <li class="menuparent">
						<?php if(Yii::$app->user->isGuest){ ?>
							<span class="menuparent"><a href="/user/login">Личный кабинет</a></span>
						<?php } else { ?><span class="menuparent nolink">Личный кабинет</span><?php } ?>
						<?php if(!Yii::$app->user->isGuest):?>
						<ul>
							<li>
								<a href="/user/orders">Я арендовал(а)</a>
							</li>
							<li>
								<a href="/realty/clientRealty">Мои квартиры</a>
							</li>
							<li>
								<a href="/user/messages">Сообщения</a>
							</li>
						</ul>
						<?php endif; ?>
					</li> -->
                    <li>
                        <a href="/articles/about">Что такое квартари?</a>
                    </li>
                </ul><!-- /.nav -->

                <!--<form method="get" class="site-search" action="?">
                    <div class="input-append">
                        <input title="Enter the terms you wish to search for." class="search-query span2 form-text" placeholder="Поиск" type="text" name="">
                        <button type="submit" class="btn">
                            <i class="icon-search"></i>
                        </button>
                    </div>
                </form><!-- /.site-search -->
            </div><!-- /.navigation -->
        </div><!-- /.navigation-wrapper -->
    </div><!-- /.container -->
</div><!-- /.navigation -->
