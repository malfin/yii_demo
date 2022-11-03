<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

?>
<h1 class="my-3">Каталог</h1>

<?php Yii::$app->session->hasFlash('error') ?>
<?php Yii::$app->session->hasFlash('success') ?>
<div class="d-flex justify-content-between flex-wrap my-3">
    <div class="btn-group">
        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Отфильтровать по категориям
        </button>
        <ul class="dropdown-menu">
            <form action="get">
                <?php foreach ($category as $item): ?>
                    <li><a class="dropdown-item" href="products?category=<?= $item['id'] ?>"><?= $item['name'] ?></a>
                    </li>
                <?php endforeach; ?>
            </form>
        </ul>
    </div>
    <div class="btn-group">
        <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Сортировать по
        </button>
        <ul class="dropdown-menu">
            <form method="get">
                <li><a class="dropdown-item" href="products?year=DESC">году (макс)</a></li>
                <li><a class="dropdown-item" href="products?year=ASC">году (мин)</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="products?name=DESC">названию (макс)</a></li>
                <li><a class="dropdown-item" href="products?name=ASC">названию (мин)</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="products?price=DESC">цене (макс)</a></li>
                <li><a class="dropdown-item" href="products?price=ASC">цене (мин)</a></li>
            </form>
        </ul>
    </div>
</div>

<div class="d-flex justify-content-between flex-wrap my-3">
    <?php foreach ($product as $item): ?>
        <div class="card">
            <img src="images/<?= $item['image'] ?>" alt="<?= $item['name'] ?>" class="card-img">
            <div class="card-body">
                <h3 class="card-title">
                    <a href="<?= Url::toRoute(['products/view', 'id' => $item['id']]) ?>"
                       class="text-dark text-decoration-none">
                        <?= $item['name'] ?>
                    </a>
                </h3>
                <p class="card-text">
                    <?= $item['price'] ?> руб.
                </p>
                <?php if (!Yii::$app->user->isGuest): ?>
                    <div class="d-grid gap-2">
                        <a href="<?= Url::toRoute(['products/add', 'id' => $item['id']]) ?>" class="btn btn-success">Добавить
                            в корзину</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>
