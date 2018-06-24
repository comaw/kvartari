<?php
namespace frontend\controllers;

use frontend\models\Article;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Article controller
 */
class ArticleController extends Controller
{

    /**
     *
     * @param string $url
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionView(string $url)
    {
        $model = Article::find()->where(['=', 'url', $url])->one();
        if (!$model) {
            throw new NotFoundHttpException();
        }

        return $this->render('view', ['model' => $model]);
    }
}
