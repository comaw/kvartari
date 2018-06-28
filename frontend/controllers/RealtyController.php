<?php
namespace frontend\controllers;

use frontend\models\Realty;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Realty controller
 */
class RealtyController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['create'],
                'rules' => [
                    [
                        'actions' => ['create'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Realty();
        $model->status_id = 1;
        $model->user_id = Yii::$app->user->id;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save(false);
            Yii::$app->session->setFlash('success', Yii::t('app', 'Успешно сохранено!'));

            return $this->refresh();
        }

        return $this->render('create', ['model' => $model]);
    }
}
