<?php

/* @var $this yii\web\View */
use yii\helpers\Url;

$this->title = 'Корзина';
?>

<? if ($session['cart']) {?>

<table class="table">
    <tr>
        <th>Название</th>
        <th>Цена</th>
        <th>Количество</th>
    </tr>
    <? foreach($session['cart'] as $id => $item) {?>
        <tr>
            <th><?= $item['title']; ?></th>
            <th><?= $item['price']; ?></th>
            <th><?= $item['quantity']; ?></th>
        </tr>
    <? } ?>
</table>

<a href="<?= Url::to(['site/clear-cart'])?>" class="btn btn-info btn-block">Очистить корзину</a>

<? } else { echo 'Корзина пуста.'; } ?>
