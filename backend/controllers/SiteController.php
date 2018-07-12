<?php
namespace backend\controllers;

use backend\models\Realty;
use backend\models\Reservation;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $countRealty['new'] = Realty::find()->where(['=', 'status_id', 1])->count();
        $countRealty['active'] = Realty::find()->where(['=', 'status_id', 2])->count();
        $countRealty['cancel'] = Realty::find()->where(['=', 'status_id', 3])->count();
        $countRealty['ban'] = Realty::find()->where(['=', 'status_id', 4])->count();

        $countReservation['new'] = Reservation::find()->where(['=', 'status', 1])->count();
        $countReservation['active'] = Reservation::find()->where(['=', 'status', 2])->count();
        $countReservation['cancel'] = Reservation::find()->where(['=', 'status', 3])->count();
        $countReservation['close'] = Reservation::find()->where(['=', 'status', 4])->count();

        return $this->render('index', ['countRealty' => $countRealty, 'countReservation' => $countReservation]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
