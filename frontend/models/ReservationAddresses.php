<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 11.07.2018
 * Time: 21:57
 */

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\UploadedFile;

/**
 * Class ReservationAddresses
 * @package frontend\models
 *
 * @property UploadedFile $photo
 */
class ReservationAddresses extends \common\models\ReservationAddresses
{
    const IMAGE_EXTENSION = '.jpg';

    public $photo;

    public function rules()
    {
        return ArrayHelper::merge([
            [['photo'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg, jpeg'],
        ], parent::rules());
    }

    /**
     * @return string
     */
    public function getPhotoPath(): string
    {
        return Url::home(true) . $this->generatePhotoPathAndName(false) . $this->id . self::IMAGE_EXTENSION;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return ArrayHelper::merge([
            'photo' => Yii::t('app', 'Фото на фоне паспорта'),
        ], parent::attributeLabels());
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->photo->saveAs($this->generatePhotoPathAndName(true));
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param bool $create
     * @return string
     */
    protected function generatePhotoPathAndName(bool $create = false): string
    {
        $path = floor($this->id / 1000);
        $dir = '/upload/photoadditional/' . $path . '/';
        if ($create) {
            if (!is_dir(Yii::getAlias('@frontend/web') . $dir)) {
                mkdir(Yii::getAlias('@frontend/web') . $dir, 0777);
            }

            return Yii::getAlias('@frontend/web') . $dir . $this->id . self::IMAGE_EXTENSION;
        }

        return $dir . $this->id . self::IMAGE_EXTENSION;
    }

}
