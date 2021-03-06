<?php
namespace frontend\controllers;

use common\lib\Pagination;
use common\models\User;
use frontend\models\FormSearch;
use frontend\models\Realty;
use frontend\models\RealtyView;
use frontend\models\Reservation;
use frontend\models\ReservationAddresses;
use frontend\models\SignupForm;
use frontend\models\Status;
use frontend\models\UserAddress;
use frontend\models\UserRealtySearch;
use frontend\models\UserRealtySearchTerm;
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
                'only' => ['create', 'personal', 'tenant'],
                'rules' => [
                    [
                        'actions' => ['create', 'personal', 'tenant'],
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

    /**
     * @param int $page
     *
     * @return string
     */
    public function actionSearch(int $page = 0)
    {
        $formSearch = new FormSearch();
        $query = Realty::find()->with(['reservation', 'images', 'status', 'country', 'city'])->where(['=', 'status_id', Status::STATUS_ACTIVE]);
        if ($formSearch->load(Yii::$app->request->get()) && $formSearch->validate()) {
            $query->andWhere(['=', 'country_id', $formSearch->country]);
            if ($formSearch->city) {
                $query->andWhere(['=', 'city_id', $formSearch->city]);
            }
            if ($formSearch->type_housing_id) {
                $query->andWhere(['=', 'type_housing_id', $formSearch->type_housing_id]);
            }
            if ($formSearch->price_from) {
                $query->andWhere(['>=', 'price', $formSearch->price_from]);
            }
            if ($formSearch->price_to) {
                $query->andWhere(['<=', 'price', $formSearch->price_to]);
            }
        }
        $query->leftJoin("{{%reservation}}", "{{%reservation}}.realty_id = {{%realty}}.id");
        $countQuery = clone $query;
        $pages = new Pagination(['pageSize' => 15, 'totalCount' => $countQuery->count()]);
        $query->offset($pages->offset)
            ->with(['city', 'country', 'images', 'deviceServices', 'terms'])
            ->limit($pages->limit)
            ->orderBy('');

        $models = $query->all();

        return $this->render('list', [
            'models' => $models,
            'pages' => $pages,
            'filter' => 'search',
        ]);
    }

    /**
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionTenant()
    {
        $realty = null;
        if ($realtyId = Yii::$app->request->get('realty')) {
            $realty = Realty::getMyCurrentRealty($realtyId);
            if (!$realty) {
                throw new NotFoundHttpException();
            }
        }
        $models = [];
        if ($realty) {
            $sql = UserRealtySearch::find();
            $sql->where("country_id = :country_id AND city_id = :city_id AND type_housing_id = :type_housing_id", [
                    ':country_id' => $realty->country_id,
                    ':city_id' => $realty->country_id,
                    ':type_housing_id' => $realty->country_id,
                ]);
            $sql->andWhere("places = :places OR places IS NULL", [':places' => $realty->places]);
            $sql->andWhere("footage = :footage OR footage IS NULL", [':footage' => $realty->footage]);
            $sql->andWhere("number_rooms = :number_rooms OR number_rooms IS NULL", [':number_rooms' => $realty->number_rooms]);
            $sql->andWhere("price_from <= :price_from OR price_from IS NULL", [':price_from' => $realty->price]);
            $sql->andWhere("price_to >= :price_to OR price_to IS NULL", [':price_to' => $realty->price]);
            $sql->limit(50);
            $sql->orderBy('id DESC');
            $models = $sql->all();
        }


        return $this->render('tenant', [
            'models' => $models,
            'realty' => $realty,
        ]);
    }

    /**
     * @param string $filter
     * @param int $page
     *
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionList(string $filter, int $page = 0)
    {
        $query = Realty::find()->with(['reservation', 'images', 'status', 'country', 'city'])->where(['=', 'status_id', Status::STATUS_ACTIVE]);
        $query->with(['city', 'country', 'images', 'deviceServices', 'terms']);
        $query->leftJoin("{{%reservation}}", "{{%reservation}}.realty_id = {{%realty}}.id");
        if ($filter == 'my') {
            if (!Yii::$app->user->isGuest) {
                $query = UserRealtySearch::findCreate($query);
            } else {
                throw new NotFoundHttpException();
            }
        }

        $countQuery = clone $query;
        $pages = new Pagination(['pageSize' => 15, 'totalCount' => $countQuery->count()]);
        $query->offset($pages->offset)->limit($pages->limit);
        switch ($filter) {
            case 'my':
                $query->orderBy('id DESC');
                break;
            case 'popular':
                $query->joinWith(['realtyView']);
                $query->orderBy('views DESC');
                break;
            case 'cheap':
                $query->orderBy('price ASC');
                break;
            case 'expensive':
                $query->orderBy('price DESC');
                break;
            case 'new':
                $query->orderBy('id DESC');
                break;
            default:
                throw new NotFoundHttpException();
        }
        $models = $query->all();

        return $this->render('list', [
            'models' => $models,
            'pages' => $pages,
            'filter' => $filter,
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
            ->with(['reservation', 'city', 'country', 'images', 'deviceServices', 'terms'])
            ->where(['=', 'url', $url])
            ->andWhere("(status_id = :status_id OR user_id = :user_id)",
                [':status_id' => Status::STATUS_ACTIVE, ':user_id' => Yii::$app->user->id])
            ->one();

        if (!$model) {
            throw new NotFoundHttpException();
        }

        $model->realtyView->updateCounters(['views' => 1]);

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
            $reservationCurrent = Reservation::find()->where("realty_id = :realty_id AND status <= :status AND date_from >= :date_from AND date_to <= :date_to", [
                ':realty_id' => $model->id,
                ':status' => 2,
                ':date_from' => $reservation->date_from,
                ':date_to' => $reservation->date_to,
            ])->one();
            if ($reservationCurrent) {
                $reservation->addError('date_from', Yii::t('app', 'Квартира уже занята на этот период! Выберите другой период.'));
            } else {
                $user = User::find()->where(['=', 'phone', $reservation->phone])->orWhere([
                        '=',
                        'email',
                        $reservation->email
                    ])->one();
                if ($user && Yii::$app->user->id != $user->id) {
                    $reservation->addError('phone', Yii::t('app', 'Такой телеон или email уже зарегстрированы - войди на сайт'));
                } elseif (!$user) {
                    $user = new User();
                    $user->username = $reservation->name;
                    $user->email = $reservation->email;
                    $user->phone = $reservation->phone;
                    $user->setPassword(rand(999999, 9999999));
                    $user->generateAuthKey();
                    if ($user->validate()) {
                        $user->save(false);
                        Yii::$app->getUser()->login($user);
                    } else {
                        $reservation->addError('date_from', join('', $user->getErrors()));
                    }
                }
                if (Yii::$app->user->id == $user->id) {
                    $reservation->user_id = Yii::$app->user->id;
                    $reservation->save(false);

                    return $this->redirect(['/realty/apply', 'reservation' => $reservation->id]);
                }
                $reservation->addError('date_from', Yii::t('app', 'Не удалось оформить, залогинтесь пожалуста'));
            }
        }
        $reservations = Reservation::find()->where(['=', 'realty_id', $model->id])
            ->andWhere(['>=', 'date_from', date("Y-m-d")])
            ->all();

        return $this->render('detail', ['model' => $model, 'reservation' => $reservation, 'reservations' => $reservations]);
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
