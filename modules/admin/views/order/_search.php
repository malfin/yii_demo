<?php

use app\models\Product;
use app\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id')->dropDownList(
        ArrayHelper::map(User::find()->all(), 'id', 'username')
    ) ?>

    <?= $form->field($model, 'product_id')->dropDownList(
        ArrayHelper::map(Product::find()->all(), 'id', 'name')
    ) ?>

    <?= $form->field($model, 'counts')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'status')->dropDownList([
        0 => 'Отмена',
        1 => 'Новый',
        2 => 'Подтверждённый',
    ]) ?>

    <?php // echo $form->field($model, 'warning') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Найти'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Сбросить'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
