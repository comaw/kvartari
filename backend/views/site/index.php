<?php

use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */

/** @var $countRealty array */
/** @var $countReservation array */

$this->title = Yii::t('app', 'Dashboard');
?>
<div class="site-index">
    <h1><?=$this->title?></h1>
    <h3>Квартиры</h3>
    <table class="table table-striped">
        <thead>
        <tbody>
        <tr>
            <th>Новых квартир</th>
            <td><?=$countRealty['new']?></td>
            <td><?=Html::a('Поспотреть', ['/realty/index', 'RealtySearch' => ['status_id' => 1]])?></td>
        </tr>
        <tr>
            <th>Активных квартир</th>
            <td><?=$countRealty['active']?></td>
            <td><?=Html::a('Поспотреть', ['/realty/index', 'RealtySearch' => ['status_id' => 2]])?></td>
        </tr>
        <tr>
            <th>Отказов квартир</th>
            <td><?=$countRealty['cancel']?></td>
            <td><?=Html::a('Поспотреть', ['/realty/index', 'RealtySearch' => ['status_id' => 3]])?></td>
        </tr>
        <tr>
            <th>Забаненых квартир</th>
            <td><?=$countRealty['ban']?></td>
            <td><?=Html::a('Поспотреть', ['/realty/index', 'RealtySearch' => ['status_id' => 4]])?></td>
        </tr>
        </tbody>
    </table>
    <h3>Зарезервированные</h3>
    <table class="table table-striped">
        <thead>
        <tbody>
        <tr>
            <th>Ждет подтверждения оплаты</th>
            <td><?=$countReservation['new']?></td>
            <td><?=Html::a('Поспотреть', ['/reservation/index', 'ReservationSearch' => ['status' => 1]])?></td>
        </tr>
        <tr>
            <th>Оплата зарезервированна</th>
            <td><?=$countReservation['active']?></td>
            <td><?=Html::a('Поспотреть', ['/reservation/index', 'ReservationSearch' => ['status' => 2]])?></td>
        </tr>
        <tr>
            <th>Отказов</th>
            <td><?=$countReservation['cancel']?></td>
            <td><?=Html::a('Поспотреть', ['/reservation/index', 'ReservationSearch' => ['status' => 3]])?></td>
        </tr>
        <tr>
            <th>Закрыто</th>
            <td><?=$countReservation['close']?></td>
            <td><?=Html::a('Поспотреть', ['/reservation/index', 'ReservationSearch' => ['status' => 3]])?></td>
        </tr>
        </tbody>
    </table>
</div>
