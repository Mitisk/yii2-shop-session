<?php

/* @var $this yii\web\View */
use yii\helpers\Url;

$this->title = 'Магазин впечатлений';
?>

    <div class="col-md-3">
        <ul class="nav justify-content-center">
            <? foreach ($categorys as $category) { ?>

            <li class="nav-item" <? if ($select_category->id == $category->id) {echo 'style="background-color: #9d9d9d"';} ?> >
                <a class="nav-link" href="<?= Url::to(['index', 'category' => $category->id]) ?>"><?= $category->title ?></a>
            </li>

            <? } ?>
      </ul>
    </div>



    <div class="col-md-9">

        <? foreach ($products as $product) { ?>
            <div class="col-md-4">
            <div class="card card-product">

                <img src="<?= Url::to(['img/' . $product->id . '.png'])?>" class="card-img-top">

                <div class="card-body">
                    <h5 class="card-title"><?= $product->title ?></h5>

                    <p class="card-text"><?= $product->description ?></p>

                        <? if ($product->quantity >= 1) { ?>
                            <button id="<?= $product->id ?>" class="add-to-cart btn btn-info btn-block">
                                <i class="glyphicon glyphicon-shopping-cart"></i> <?= $product->price ?> руб.
                            </button>
                        <? } else { ?>
                            <a class="btn btn-info btn-block disabled"> Нет в наличии </a>
                        <? } ?>

                </div>

            </div>
            </div>
        <? } ?>

    </div>

        <div class="row">
            <div class="col-lg-12">
                <h2>Задание</h2>

                <p>Необходито реализовать одну страницу на которой будут отражены категории и товары, находящиеся в них, сгруппированные по этим категориям. Детальная страница не нужна.
                    <br><br> Если товар в наличии, то должна быть кнопка Добавить в корзину. По нажатию идет Ajax запрос:
                </p>
                <p>
                    <li>Товар должен сохраниться в сессию и в базу данных (сессия, товар, дата добавления)</li>
                    <li>Отобразить количество добавленных товаров в корзину в шапке сайта</li>
                </p>
            </div>

        </div>




