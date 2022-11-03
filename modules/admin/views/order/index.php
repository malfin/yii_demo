<?php

use app\models\Order;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Заказы');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Создать заказ'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'user_id',
                'value' => function ($data) {
                    return $data->user->surname . " " . $data->user->name . " " . $data->user->patronymic;
                }
            ],
            'product_id' => [
                'contentOptions' => ['class' => 'w-50'],
                'attribute' => 'product_id',
                'format' => ['image'],
                'value' => function ($data) {
                    return '../../images/' . $data->product->image;
                },
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
            //'warning:ntext',
            'created_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Order $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
