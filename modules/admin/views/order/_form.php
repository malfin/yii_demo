<?php

use app\models\Product;
use app\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

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

    <?= $form->field($model, 'warning')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_at')->textInput(['type' => 'datetime-local']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
