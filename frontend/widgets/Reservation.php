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
 * @property Reservation $reservation
 */
class Reservation extends Widget
{
    public $realty;
    public $reservation;

    public function init()
    {
        parent::init();
    }

    /**
     * @return string
     */
    public function run()
    {
        return $this->render('reservation', ['model' => $this->reservation, 'realty' => $this->realty]);
    }
}
