<?php

use app\models\Category;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_id')->dropDownList(
        ArrayHelper::map(Category::find()->all(), 'id', 'name')
    ) ?>

    <?= $form->field($model, 'image')->fileInput(['accept' => 'image/*', 'class' => 'my-2 form-control']) ?>

    <?= $form->field($model, 'price')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'country')->textInput() ?>

    <?= $form->field($model, 'year')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'counts')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'created_at')->textInput(['type' => 'datetime-local']) ?>

    <?= $form->field($model, 'updated_at')->textInput(['type' => 'datetime-local']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
