<?php

namespace frontend\controllers;

use frontend\models\Offer;
use frontend\models\Realty;
use frontend\models\Status;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;

/**
 * Class OfferController
 * @package frontend\controllers
 */
class OfferController extends \yii\web\Controller
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
     * @param int $offer
     * @param int $id
     * @return string
     * @throws BadRequestHttpException
     * @throws NotFoundHttpException
     */
    public function actionAdd(int $offer, int $id)
    {
        $realty = Realty::getMyCurrentRealty($id);
        $userId = $offer;
        if (!$realty) {
            throw new NotFoundHttpException();
        }
        $offer = Offer::find()->where("owner_id = :owner_id AND realty_id = :realty_id AND user_id = :user_id", [
            ':owner_id' => $realty->user_id,
            ':realty_id' => $realty->id,
            ':user_id' => $userId,
        ])->one();
        if (!$offer) {
            $offer = new Offer();
            $offer->owner_id = $realty->user_id;
            $offer->realty_id = $realty->id;
            $offer->user_id = $userId;
        }
        $offer->created = date("Y-m-d H:i:s");
        if ($offer->save()) {
            return $this->redirect(['realty/tenant', 'realty' => $id]);
        }

        throw new BadRequestHttpException();
    }

    /**
     * @param int $page
     * @return string
     */
    public function actionPersonal(int $page = 0)
    {
        $query = Realty::find()->with(['reservation', 'images', 'status', 'country', 'city'])->where(['=', 'status_id', Status::STATUS_ACTIVE]);
        $query->with(['city', 'country', 'images', 'deviceServices', 'terms']);
        $query->leftJoin("{{%offer}}", "{{%offer}}.realty_id = {{%realty}}.id");
        $query->andWhere(['=', '{{%offer}}.user_id', Yii::$app->user->id]);

        $countQuery = clone $query;
        $pages = new Pagination(['pageSize' => 15, 'totalCount' => $countQuery->count()]);
        $query->offset($pages->offset)->limit($pages->limit);
        $query->orderBy('created DESC');
        $models = $query->all();

        return $this->render('personal', [
            'models' => $models,
            'pages' => $pages,
        ]);
    }
}
