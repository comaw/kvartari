<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 08.07.2018
 * Time: 18:48
 */

namespace frontend\widgets;

use frontend\models\Realty;
use yii\base\Widget;
use yii\helpers\Html;
use Yii;

/**
 * Class Reservation
 * @package frontend\widgets
 *
 * @property Realty $realty
 */
class Reservation extends Widget
{
    public $realty;

    public function init()
    {
        parent::init();
    }

    /**
     * @return string
     */
    public function run()
    {
        $model = new \frontend\models\Reservation();
        $model->realty_id = $this->realty->id;
        if (!Yii::$app->user->isGuest) {
            $model->name = Yii::$app->user->identity->username;
            $model->email = Yii::$app->user->identity->email;
            $model->phone = Yii::$app->user->identity->phone;
        }

        return $this->render('reservation', ['model' => $model, 'realty' => $this->realty]);
    }
}
