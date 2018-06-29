<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
$this->params['breadcrumbs'][] = $name;
$this->registerMetaTag([
    'name' => 'description',
    'content' => $name
]);
?>
<div class="container">
    <div id="main">
        <div class="row" id="article-body">
            <h1 class="page-header"><?= Html::encode($this->title) ?></h1>
            <?= nl2br(Html::encode($message)) ?>
        </div>
    </div>
</div>
