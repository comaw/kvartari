<?php

namespace backend\controllers;

use Yii;
use backend\ext\BaseController;

/**
 * Class ClearController
 * @package backend\controllers
 */
class ClearController extends BaseController
{
    /**
     * @return string
     */
    public function actionCache()
    {
        Yii::$app->cache->flush();
        Yii::$app->cacheDb->flush();
        Yii::$app->cacheFile->flush();
        Yii::$app->cacheFileAdmin->flush();
        Yii::$app->cacheFileFront->flush();

        return $this->render('cache');
    }
}
