<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 19.06.2018
 * Time: 00:30
 */

namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use Yii;

/**
 * Class Top
 * @package frontend\widgets
 */
class Top extends Widget
{

    public function init()
    {
        parent::init();
    }

    /**
     * @return string
     */
    public function run()
    {
        return $this->render('Top', []);
    }
}
