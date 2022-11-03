<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var app\models\PasswordForm $model */

?>
<h1>Корзина</h1>

<?php Yii::$app->session->hasFlash('error') ?>
<?php Yii::$app->session->hasFlash('success') ?>

<div class="my-2">
    <h3>Оформление заказа</h3>
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'password')->passwordInput() ?>

    <div class="d-grid gap-2">
        <?= Html::submitButton('Сформировать заказ', ['class' => 'btn btn-success my-2']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<div class="my-2">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название товара</th>
            <th scope="col">Количество</th>
            <th scope="col">Действие</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($basket as $item): ?>
            <tr>
                <th scope="row"><?= $item['id'] ?></th>
                <td><?= $item['product']['name'] ?></td>
                <td><?= $item['counts'] ?></td>
                <td>
                    <div class="row">
                        <div class="col">
                            <a href="<?= Url::toRoute(['basket/add', 'id' => $item['id']]) ?>" class="btn btn-success">Добавить</a>
                        </div>
                        <div class="col">
                            <a href="<?= Url::toRoute(['basket/remove', 'id' => $item['id']]) ?>"
                               class="btn btn-danger">Удалить</a>
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
