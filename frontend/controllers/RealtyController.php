<?php
namespace frontend\controllers;

use frontend\models\Realty;
use frontend\models\RealtyView;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

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
     * @throws \yii\base\Exception
     */
    public function actionCreate()
    {
        $model = new Realty(['scenario' => 'create']);
        $model->status_id = 1;
        $model->user_id = Yii::$app->user->id;
//        $model->setServicesIds();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $isNewRecord = $model->isNewRecord;
            $model->save(false);
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            $model->upload($isNewRecord);

            $realtyView = new RealtyView();
            $realtyView->id = $model->id;
            $realtyView->save();

            Yii::$app->session->setFlash('success', Yii::t('app', 'Успешно сохранено!'));

            return $this->refresh();
        }

        return $this->render('create', ['model' => $model]);
    }
}
