<?php

use yii\helpers\Url; ?>
<div class="my-2">
    <?php Yii::$app->session->hasFlash('error') ?>
    <?php Yii::$app->session->hasFlash('success') ?>
</div>
<div class="my-2">
    <div class="row">
        <div class="col">
            <img src="../images/<?= $product['image']; ?>" class="w-75" alt="<?= $product['name']; ?>"/>
        </div>
        <div class="col">
            <h3>Название: <?= $product['name']; ?></h3>
            <p>Цена: <?= $product['price']; ?></p>
            <p>Страна-производитель: <?= $product['country']; ?></p>
            <p>Год выпуска: <?= $product['year']; ?></p>
            <p>Модель: <?= $product['model']; ?></p>
            <?php if (!Yii::$app->user->isGuest): ?>
                <div class="d-grid gap-2">
                    <a href="<?= Url::toRoute(['products/add', 'id' => $product['id']]) ?>" class="btn btn-success">Добавить
                        в корзину</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
