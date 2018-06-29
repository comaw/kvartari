<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 19.06.2018
 * Time: 00:30
 */

namespace frontend\widgets;

use frontend\models\Realty;
use frontend\models\Status;
use yii\base\Widget;
use yii\helpers\Html;
use Yii;

/**
 * Class NewRealtyHome
 * @package frontend\widgets
 */
class NewRealtyHome extends Widget
{
    const LIMIT_VIEWS = 9;

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
            return Realty::find()
                ->with(['images', 'country', 'city'])
                ->innerJoinWith(['realtyView'])
                ->where(['=', 'status_id', Status::STATUS_ACTIVE])
                ->orderBy('{{%realty_view}}.updated DESC')
                ->limit(self::LIMIT_VIEWS)
                ->all();
        }, Yii::$app->params['mysqlQueriesCache']);

        return $this->render('newRealtyHome', ['models' => $models]);
    }
}
