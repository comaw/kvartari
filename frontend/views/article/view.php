<?php
/**
 * Created by PhpStorm.
 * User: comaw
 * Date: 24.06.2018
 * Time: 15:03
 */

/** @var $model \frontend\models\Article */

$this->title                   = $model->title ?? $model->name;
$this->params['breadcrumbs'][] = $model->name;
$this->registerMetaTag([
    'name' => 'description',
    'content' => $model->description ?? $model->name
]);

?>
<div class="container">
    <div id="main">
        <div class="row" id="article-body">
            <h1 class="page-header"><?=$model->name?></h1>
            <?=$model->text?>
        </div>
    </div>
</div>
