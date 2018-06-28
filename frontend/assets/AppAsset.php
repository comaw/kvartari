<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/jquery-ui.min.css',
        'css/main/bootstrap.css',
        'css/main/bootstrap-responsive.css',
        'css/custom.css',
        'libraries/chosen/chosen.css',
        'libraries/bootstrap-fileupload/bootstrap-fileupload.css',
        'css/main/realia-blue.css',
    ];
    public $js = [
//        'js/jquery.min.js',
        'js/bootstrap.min.js',
        'js/jquery-ui.min.js',
        'js/jquery.ezmark.js',
        'js/jquery.currency.js',
        'js/jquery.cookie.js',
        'js/retina.js',
        'js/custom.js',
        'js/carousel.js',
        'libraries/chosen/chosen.jquery.min.js',
        'libraries/iosslider/_src/jquery.iosslider.min.js',
        'libraries/bootstrap-fileupload/bootstrap-fileupload.js',
        'js/realia.js',
        'js/noty/packaged/jquery.noty.packaged.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
