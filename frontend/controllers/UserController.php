<?php
namespace frontend\controllers;

use frontend\models\User;
use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;

/**
 * User controller
 */
class UserController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => false,
                        'roles' => ['?'],
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
    public function actionProfile()
    {
        $model = User::findIdentity(Yii::$app->user->id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->password && $model->confirm == $model->password) {
                $model->password_hash = Yii::$app->security->generatePasswordHash($model->password);
            }
            $model->save(false);
            Yii::$app->session->setFlash('success', Yii::t('app', 'Успешно сохранено!'));

            return $this->refresh();
        }

        return $this->render('profile', ['model' => $model]);
    }
}
