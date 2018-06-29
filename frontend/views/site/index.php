<?php

/* @var $this yii\web\View */

$this->title = Yii::t('app', 'Новые квартиры');
$this->registerMetaTag([
    'name' => 'description',
    'content' => Yii::t('app', 'Новые квартиры')
]);
?>

<?=\frontend\widgets\HomePageLinks::widget()?>
