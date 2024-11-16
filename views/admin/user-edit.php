<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */     
/** @var app\models\LoginForm $model */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>
<div class="container mt-3 bg-dark text-white" data-bs-theme="dark">
  <h2>Create New Post</h2>
  <?php $form = ActiveForm::begin(); ?>
  <?= $form->field($model, 'username')->textInput() ?>
  <?= $form->field($model, 'fullname')->textInput() ?>
  <?= $form->field($model, 'email')->textInput() ?> 
  <div class="form-group"> <?= Html::submitButton('create', ['class' => 'btn btn-success']) ?>
  </div> <?php ActiveForm::end(); ?> 
</div>
