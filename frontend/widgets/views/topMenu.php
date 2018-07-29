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
                            <?php if (!Yii::$app->user->isGuest) { ?>
                                <li>
                                    <a href="<?=Url::toRoute(['realty/list', 'filter' => 'my'])?>" title="Мои предпочтения">Мои предпочтения</a>
                                </li>
                            <?php } ?>
                            <li>
                                <a href="<?=Url::toRoute(['realty/list', 'filter' => 'new'])?>" title="Новые предложения">Новые предложения</a>
                            </li>
                            <li>
                                <a href="<?=Url::toRoute(['realty/list', 'filter' => 'popular'])?>" title="Популярные">Популярные</a>
                            </li>
                            <li>
                                <a href="<?=Url::toRoute(['realty/list', 'filter' => 'cheap'])?>" title="От дешевых к дорогим">От дешевых к дорогим</a>
                            </li>
                            <li>
                                <a href="<?=Url::toRoute(['realty/list', 'filter' => 'expensive'])?>" title="От дорогих к дешевым">От дорогих к дешевым</a>
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
