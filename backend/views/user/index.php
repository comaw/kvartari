<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use backend\models\User;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
//            'role',
            [
                'attribute' => 'role',
                'contentOptions' => ['style' => 'word-wrap: break-word; overflow-wrap: break-word; white-space: pre-wrap; width: 130px; '],
                'format' => 'raw',
                'value' => function($data){
                    return $data->getRole();
                },
                'filter' => User::listRole()
            ],
            'username',
//            'auth_key',
//            'password_hash',
            // 'password_reset_token',
             'email',
            [
                'attribute' => 'status',
                'contentOptions' => ['style' => 'word-wrap: break-word; overflow-wrap: break-word; white-space: pre-wrap; width: 130px; '],
                'format' => 'raw',
                'value' => function($data){
                    return $data->getStatus();
                },
                'filter' => User::listStatus()
            ],
            [
                'attribute' => 'created_at',
                'contentOptions' => ['style' => 'word-wrap: break-word; overflow-wrap: break-word; white-space: pre-wrap; width: 130px; '],
                'format' => 'raw',
                'value' => function($data){
                    return date("d/m/Y H:i:s", $data->created_at);
                },
                'filter' => false
            ],
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
