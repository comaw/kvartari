<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Realty controller
 */
class RealtyController extends Controller
{

    /**
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = null;

        return $this->render('create', ['model' => $model]);
    }
}
