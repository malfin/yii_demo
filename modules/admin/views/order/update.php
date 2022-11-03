<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = Yii::t('app', 'Обновить заказ: {name}', [
    'name' => $model->user->username,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Заказы'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Обновить');
?>
<div class="order-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
