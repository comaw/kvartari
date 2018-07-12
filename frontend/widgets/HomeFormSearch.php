<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 29.06.2018
 * Time: 12:49
 */

namespace frontend\widgets;

use frontend\models\FormSearch;
use yii\base\Widget;
use yii\helpers\Html;
use Yii;

/**
 * Class HomeFormSearch
 * @package frontend\widgets
 */
class HomeFormSearch extends Widget
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
        $model = new FormSearch();
        $model->load(Yii::$app->request->get());

        return $this->render('homeFormSearch', ['model' => $model]);
    }
}
