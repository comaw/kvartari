<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 28.06.2018
 * Time: 09:47
 */

namespace frontend\models;

use common\CImageHandler;
use common\lib\ImageHelper;
use common\models\base\RealtyTerm;
use common\UrlHelper;
use yii\helpers\ArrayHelper;
use frontend\models\RealtyService;
use frontend\models\Image;
use yii\web\UploadedFile;
use Yii;

/**
 * Class Realty
 * @package frontend\models
 *
 * @property array $servicesIds
 * @property array $serviceDeviceIds
 * @property array $termIds
 * @property UploadedFile[] $imageFiles
 * @property Reservation $reservation
 */
class Realty extends \common\models\Realty
{
    const IMAGE_MINI       = '_mini';
    const IMAGE_NORMAL     = '_normal';
    const IMAGE_MAX        = '';
    const IMAGE_EXTENSION  = '.jpg';
    const MAX_COUNT_IMAGES = 10;

    public $servicesIds = [];
    public $serviceDeviceIds = [];
    public $termIds = [];
    public $imageFiles;

    /**
     * @return array
     */
    public static function imageSizes(): array
    {
        return [
            self::IMAGE_MAX => self::IMAGE_MAX,
            self::IMAGE_NORMAL => self::IMAGE_NORMAL,
            self::IMAGE_MINI => self::IMAGE_MINI,
        ];
    }

    /**
     * @return $this
     */
    public function setTermIds()
    {
        if (!$this->realtyTerms) {
            $this->termIds = [];

            return $this;
        }
        $this->termIds = ArrayHelper::map($this->realtyTerms, 'term_id', 'term_id');

        return $this;
    }

    /**
     * @return $this
     */
    public function setServiceDeviceIds()
    {
        if (!$this->realtyDeviceServices) {
            $this->serviceDeviceIds = [];

            return $this;
        }
        $this->serviceDeviceIds = ArrayHelper::map($this->realtyDeviceServices, 'device_service_id', 'device_service_id');

        return $this;
    }

    /**
     * @return $this
     */
    public function setServicesIds()
    {
        if (!$this->realtyServices) {
            $this->servicesIds = [];

            return $this;
        }
        $this->servicesIds = ArrayHelper::map($this->realtyServices, 'service_id', 'service_id');

        return $this;
    }

    /**
     * @param bool  $insert
     * @param array $changedAttributes
     */
    public function afterSave($insert, $changedAttributes)
    {
        RealtyService::deleteAll(['=', 'realty_id', $this->id]);
        if ($this->servicesIds) {
            foreach ($this->servicesIds as $servicesId) {
                $model = new RealtyService();
                $model->realty_id  = $this->id;
                $model->service_id = $servicesId;
                $model->save(false);
            }
        }
        RealtyDeviceService::deleteAll(['=', 'realty_id', $this->id]);
        if ($this->serviceDeviceIds) {
            foreach ($this->serviceDeviceIds as $serviceDeviceId) {
                $model = new RealtyDeviceService();
                $model->realty_id  = $this->id;
                $model->device_service_id = $serviceDeviceId;
                $model->save(false);
            }
        }
        RealtyTerm::deleteAll(['=', 'realty_id', $this->id]);
        if ($this->termIds) {
            foreach ($this->termIds as $termId) {
                $model = new RealtyTerm();
                $model->realty_id  = $this->id;
                $model->term_id = $termId;
                $model->save(false);
            }
        }

        parent::afterSave($insert, $changedAttributes);
    }

    /**
     * @param bool $isNewRecord
     * @throws \yii\base\Exception
     */
    public function upload(bool $isNewRecord = false)
    {
        $ih = new CImageHandler();
        $dir = ImageHelper::getImageRealtyDir($this);
        $tempDir = ImageHelper::getTempDir();
        $countImages = $isNewRecord ? 0 : Image::find()->where(['=', 'realty_id', $this->id])->count();
        foreach ($this->imageFiles as $file) {
            $countImages++;
            if (self::MAX_COUNT_IMAGES < $countImages) {
                continue;
            }
            $name = $tempDir . md5($file->baseName) . '.' . $file->extension;
            $file->saveAs($name);
            $nameForSave = UrlHelper::translateUrl($this->url, '-', '_') . '_' . $countImages;
            $ih->load($name)
                ->resize(Yii::$app->params['imageMiniW'], Yii::$app->params['imageMiniH'], true)
                ->save($dir . $nameForSave . self::IMAGE_MINI . self::IMAGE_EXTENSION, CImageHandler::IMG_JPEG, 100)
                ->reload()
                ->resize(Yii::$app->params['imageNormalW'], Yii::$app->params['imageNormalH'], true)
                ->save($dir . $nameForSave . self::IMAGE_NORMAL . self::IMAGE_EXTENSION, CImageHandler::IMG_JPEG, 100)
                ->reload()
                ->resize(Yii::$app->params['imageMaxW'], Yii::$app->params['imageMaxH'], true)
                ->save($dir . $nameForSave . self::IMAGE_MAX . self::IMAGE_EXTENSION, CImageHandler::IMG_JPEG, 100);

            @unlink($name);
            $image = new Image();
            $image->name = str_replace( Yii::getAlias('@frontend/web/'), '/', $dir) . $nameForSave;
            $image->realty_id = $this->id;
            $image->position = $countImages;
            $image->title = str_replace('_', ' ', $nameForSave);
            $image->save();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            [['servicesIds'], 'each', 'rule' => ['integer']],
            [['serviceDeviceIds'], 'each', 'rule' => ['integer']],
            [['termIds'], 'each', 'rule' => ['integer']],
            [['imageFiles'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, gif', 'maxFiles' => 10],
            [['imageFiles'], 'file', 'extensions' => 'png, jpg, jpeg, gif', 'maxFiles' => 10, 'skipOnEmpty' => false, 'on' => 'create'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'imageFiles' => Yii::t('app', 'Фотографии')
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservation()
    {
        return $this->hasOne(Reservation::class, ['realty_id' => 'id'])
            ->where(['<=', 'status', 2])
            ->andWhere("date_from <= :dater OR date_to <= :dater", [
                ':dater' => date("Y-m-d")
            ])
            ->orderBy('id DESC');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Image::class, ['realty_id' => 'id'])->orderBy('position ASC');
    }
}
