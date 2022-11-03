<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Заказы'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Обновить'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Удалить'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Вы хотите удалить заказ?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'user_id',
                'value' => function ($data) {
                    return $data->user->surname . " " . $data->user->name . " " . $data->user->patronymic;
                }
            ],
            [
                'attribute' => 'product_id',
                'value' => function ($data) {
                    return $data->product->name;
                }
            ],
            'counts',
            [
                'attribute' => 'status',
                'value' => function ($data) {
                    switch ($data->status) {
                        case 0:
                            return 'Отменён';
                        case 1:
                            return 'Новый';
                        case 2:
                            return 'Подтверждён';
                        default:
                            return 'Error';
                    }
                }
            ],
            'warning:ntext',
            'created_at',
        ],
    ]) ?>

</div>
