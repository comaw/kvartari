<?php
/**
 * powered by php-shaman
 * LinkPager.php 09.03.2016
 * NewFutbolca
 */

namespace common\lib;

use yii\helpers\Html;
use yii\helpers\Url;
use Yii;


class LinkPager extends \yii\widgets\LinkPager
{
    public $options = ['class' => ''];

    /**
     * @var string the CSS class for the each page button.
     * @since 2.0.7
     */
    public $pageCssClass = 'page';

    /**
     * @var string the CSS class for the "first" page button.
     */
    public $firstPageCssClass = 'first';
    /**
     * @var string the CSS class for the "last" page button.
     */
    public $lastPageCssClass = 'last';
    /**
     * @var string the CSS class for the "previous" page button.
     */
    public $prevPageCssClass = 'previous';
    /**
     * @var string the CSS class for the "next" page button.
     */
    public $nextPageCssClass = 'next';
    /**
     * @var string the CSS class for the active (currently selected) page button.
     */
    public $activePageCssClass = 'disabled';
    /**
     * @var string the CSS class for the disabled page buttons.
     */
    public $disabledPageCssClass = 'hidden';
    /**
     * @var string|boolean the label for the "next" page button. Note that this will NOT be HTML-encoded.
     * If this property is false, the "next" page button will not be displayed.
     */
    public $nextPageLabel = 'Следующая &gt;';
    /**
     * @var string|boolean the text label for the previous page button. Note that this will NOT be HTML-encoded.
     * If this property is false, the "previous" page button will not be displayed.
     */
    public $prevPageLabel = '&lt; Предыдущая';

    public $maxButtonCount = 8;

    /**
     * @var string|bool the text label for the "first" page button. Note that this will NOT be HTML-encoded.
     * If it's specified as true, page number will be used as label.
     * Default is false that means the "first" page button will not be displayed.
     */
    public $firstPageLabel = '&lt;&lt; Первая';
    /**
     * @var string|bool the text label for the "last" page button. Note that this will NOT be HTML-encoded.
     * If it's specified as true, page number will be used as label.
     * Default is false that means the "last" page button will not be displayed.
     */
    public $lastPageLabel = 'Последняя &gt;&gt;';
//
//    public function init()
//    {
//        parent::init();
//        $this->registerLinkTags = true;
//    }
//
//    public function run()
//    {
//        parent::run();
//    }
//
//    protected function renderPageButton($label, $page, $class, $disabled, $active)
//    {
//        $options = ['class' => empty($class) ? $this->pageCssClass : $class];
//        if ($active) {
//            Html::addCssClass($options, $this->activePageCssClass);
//        }
//        if ($disabled) {
//            Html::addCssClass($options, $this->disabledPageCssClass);
//
//            return Html::tag('li', Html::tag('span', $label), $options);
//        }
//        $linkOptions = $this->linkOptions;
//        $linkOptions['data-page'] = $page;
//        $page = $page * Yii::$app->params['pageSize'] - 1;
//        if($active){
//            $options['rel'] = 'nofollow';
//        }
//        return Html::tag('li', Html::a($label, $this->pagination->createUrl($page), $linkOptions), $options);
//    }
}
