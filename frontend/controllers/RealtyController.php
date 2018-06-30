<?php
namespace frontend\controllers;

use common\lib\Pagination;
use frontend\models\Realty;
use frontend\models\RealtyView;
use frontend\models\Status;
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
                'only' => ['create', 'personal'],
                'rules' => [
                    [
                        'actions' => ['create', 'personal'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionPersonal()
    {
        $query = Realty::find()->where(['=', 'user_id', Yii::$app->user->id]);
        $countQuery = clone $query;
        $pages = new Pagination(['pageSize' => 2, 'totalCount' => $countQuery->count()]);
        $models = $query->offset($pages->offset)
            ->with(['city', 'country', 'images', 'deviceServices', 'terms'])
            ->limit($pages->limit)
            ->orderBy('id desc')
            ->all();

        return $this->render('personal', [
            'models' => $models,
            'pages' => $pages,
        ]);
    }

    public function actionList(int $page = 0)
    {
        $query = Realty::find()->where(['=', 'status_id', Status::STATUS_ACTIVE]);
        $countQuery = clone $query;
        $pages = new Pagination(['pageSize' => 2, 'totalCount' => $countQuery->count()]);
        $models = $query->offset($pages->offset)
            ->with(['city', 'country', 'images', 'deviceServices', 'terms'])
            ->limit($pages->limit)
            ->orderBy('id desc')
            ->all();

        return $this->render('list', [
            'models' => $models,
            'pages' => $pages,
        ]);
    }

    /**
     * @param string $url
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionDetail(string $url)
    {
        $model = Realty::find()
            ->with(['city', 'country', 'images', 'deviceServices', 'terms'])
            ->where(['=', 'url', $url])
            ->andWhere("(status_id = :status_id OR user_id = :user_id)",
                [':status_id' => Status::STATUS_ACTIVE, ':user_id' => Yii::$app->user->id])
            ->one();
        if (!$model) {
            throw new NotFoundHttpException();
        }

        return $this->render('detail', ['model' => $model]);
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
        if ($model->load(Yii::$app->request->post())) {
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            if ($model->validate()) {
                $isNewRecord = $model->isNewRecord;
                $model->save(false);

                $model->upload($isNewRecord);

                $realtyView     = new RealtyView();
                $realtyView->id = $model->id;
                $realtyView->save();

                Yii::$app->session->setFlash('success', Yii::t('app', 'Успешно сохранено!'));

                return $this->redirect(['realty/personal']);
            }
        }

        return $this->render('create', ['model' => $model]);
    }
}
