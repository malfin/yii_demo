<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

?>
<h1>Мои заказы</h1>

<div class="my-2">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название товара</th>
            <th scope="col">Количество</th>
            <th scope="col">Статус</th>
            <th scope="col">Действие</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($order as $item): ?>
            <tr>
                <th scope="row"><?= $item['id'] ?></th>
                <td><?= $item['product']['name'] ?></td>
                <td><?= $item['counts'] ?></td>
                <?php if ($item['status'] == 0): ?>
                    <td>
                        Отменён
                    </td>
                <?php elseif ($item['status'] == 1): ?>
                    <td>
                        Новый
                    </td>
                <?php elseif ($item['status'] == 2): ?>
                    <td>
                        Подтверждён
                    </td>
                <?php endif; ?>
                <td>
                    <?php if ($item['status'] == 0 or $item['status'] == 2): ?>
                        Вы не можеет удалить заказ!
                    <?php else: ?>
                        <a href="<?= Url::toRoute(['order/remove', 'id' => $item['id']]) ?>"
                           class="btn btn-danger">Удалить</a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>