<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 28.06.2018
 * Time: 09:46
 */

namespace frontend\models;

use yii\helpers\Url;

/**
 * Class Image
 * @package frontend\models
 */
class Image extends \common\models\Image
{

    /**
     * @param string $size
     * @return string
     */
    public function getPhotoPath(string $size = ''): string
    {
        if (!$size || array_search($size, Realty::imageSizes()) === false) {
            $size = Realty::IMAGE_MAX;
        }

        return Url::home(true) . ltrim($this->name, '/') . $size . Realty::IMAGE_EXTENSION;
    }
}
