<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\RegisterForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Зарегистрироваться</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{input}\n{error}",
            'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
            'inputOptions' => ['class' => 'col-lg-3 form-control'],
            'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
        ],
    ]); ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
    <?= $form->field($model, 'surname')->textInput(['autofocus' => true]) ?>
    <?= $form->field($model, 'patronymic')->textInput(['autofocus' => true]) ?>
    <?= $form->field($model, 'email')->textInput() ?>

    <?= $form->field($model, 'password')->passwordInput() ?>
    <?= $form->field($model, 'password_repeat')->passwordInput() ?>

    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
        <label class="form-check-label" for="flexCheckDefault">
            Согласен с правилами регистрации
        </label>
    </div>


    <div class="form-group">
        <div class="d-grid gap-2">
            <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary my-3', 'name' => 'login-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>
