<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 19.06.2018
 * Time: 00:36
 */

use yii\helpers\Url;

?>
<div id="navigation">
    <div class="container">
        <div class="navigation-wrapper">
            <div class="navigation clearfix-normal">
                <ul class="nav">
                    <li>
                        <a href="<?=Url::home()?>" title="Главная">Главная</a>
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
                        <a href="<?=Url::toRoute(['article/view', 'url' => 'faq'])?>" title="Частые вопросы">Частые вопросы</a>
                    </li>
                    <li>
                        <a href="<?=Url::toRoute(['article/view', 'url' => 'about'])?>" title="Что такое квартари?">Что такое квартари?</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
