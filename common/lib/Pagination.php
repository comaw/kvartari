<?php
/**
 * powered by php-shaman
 * Pagination.php 09.03.2016
 * NewFutbolca
 */

namespace common\lib;

use Yii;

/**
 * Class Pagination
 * @package common\lib
 */
class Pagination extends \yii\data\Pagination
{
    public $pageSizeParam = false;
    public $forcePageParam = false;

    /**
     * Pagination constructor.
     * @param array $config
     */
    public function __construct($config = [])
    {
//        if(Yii::$app->request->get($this->pageParam)){
//            $_GET[$this->pageParam] = (Yii::$app->request->get($this->pageParam) / Yii::$app->params['pageSize']) + 1;
//        }

        parent::__construct($config);
        $this->pageSize = Yii::$app->params['pageSize'];
    }
}
