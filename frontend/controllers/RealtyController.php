<?php
namespace frontend\controllers;

use common\lib\Pagination;
use common\models\User;
use frontend\models\Realty;
use frontend\models\RealtyView;
use frontend\models\Reservation;
use frontend\models\ReservationAddresses;
use frontend\models\SignupForm;
use frontend\models\Status;
use frontend\models\UserAddress;
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
     * @param int $reservation
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionAdditional(int $reservation)
    {
        $reservation = Reservation::find()->where(['=', 'id', $reservation])->andWhere(['=', 'user_id', Yii::$app->user->id])->one();
        if (!$reservation) {
            throw new NotFoundHttpException();
        }

        $model = new ReservationAddresses();
        $model->reservation_id = Yii::$app->user->id;
        if ($model->load(Yii::$app->request->post())) {
            $model->photo = UploadedFile::getInstance($model, 'photo');
            if ($model->validate()) {
                $model->save(false);
                $model->upload();
                Yii::$app->session->setFlash('success', 'Успешно сохраненно!');

                return $this->refresh();
            }
        }

        return $this->render('additional', ['model' => $model, 'reservation' => $reservation]);
    }

    /**
     * @param int $reservation
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionApply(int $reservation)
    {
        $reservation = Reservation::find()->where(['=', 'id', $reservation])->andWhere(['=', 'user_id', Yii::$app->user->id])->one();
        if (!$reservation) {
            throw new NotFoundHttpException();
        }
        $model = UserAddress::find()->where(['=', 'user_id', Yii::$app->user->id])->orderBy('id DESC')->one();
        if (!$model) {
            $model = new UserAddress();
            $model->user_id = Yii::$app->user->id;
        }
        if ($model->load(Yii::$app->request->post())) {
            $model->photo = UploadedFile::getInstance($model, 'photo');
            if ($model->validate()) {
                $model->save(false);
                $reservation->address_id = $model->id;
                $reservation->save();
                $model->upload();

                return $this->redirect(['/realty/additional', 'reservation' => $reservation->id]);
            }
        }

        return $this->render('apply', ['model' => $model]);
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


        $reservation = new \frontend\models\Reservation();
        $reservation->realty_id = $model->id;
        $reservation->user_id = 0;
        $reservation->address_id = 0;
        $reservation->status = 1;
        if (!Yii::$app->user->isGuest) {
            $reservation->user_id = Yii::$app->user->id;
            $reservation->name = Yii::$app->user->identity->username;
            $reservation->email = Yii::$app->user->identity->email;
            $reservation->phone = Yii::$app->user->identity->phone;
        }
        if ($reservation->load(Yii::$app->request->post()) && $reservation->validate()) {
            $user = User::find()
                ->where(['=', 'phone', $reservation->phone])
                ->orWhere(['=', 'email', $reservation->email])
                ->one();
            if ($user) {
                $reservation->addError('phone', Yii::t('app', 'Такой телеон или email уже зарегстрированы - войди на сайт'));
            } else {
                $user           = new User();
                $user->username = $reservation->name;
                $user->email    = $reservation->email;
                $user->phone    = $reservation->phone;
                $user->setPassword(rand(999999, 9999999999));
                $user->generateAuthKey();
                Yii::$app->getUser()->login($user);

                $reservation->save(false);

                return $this->redirect(['/realty/apply', 'reservation' => $reservation->id]);
            }
        }

        if (!$model) {
            throw new NotFoundHttpException();
        }

        return $this->render('detail', ['model' => $model, 'reservation' => $reservation]);
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
