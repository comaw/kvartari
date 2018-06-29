<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 19.06.2018
 * Time: 00:30
 */

namespace frontend\widgets;

use frontend\models\Realty;
use yii\base\Widget;
use yii\helpers\Html;
use Yii;

/**
 * Class Footer
 * @package frontend\widgets
 */
class Footer extends Widget
{
    const LIMIT_VIEWS = 3;

    public function init()
    {
        parent::init();
    }

    /**
     * @return string
     * @throws \Throwable
     */
    public function run()
    {
        $models = Realty::getDb()->cache(function ($db) {
            return Realty::find()->innerJoinWith(['realtyView'])->orderBy('{{%realty_view}}.updated DESC')->limit(self::LIMIT_VIEWS)->all();
        }, Yii::$app->params['mysqlQueriesCache']);

        return $this->render('footer', ['models' => $models]);
    }
}
