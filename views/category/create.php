<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */     
/** @var app\models\LoginForm $model */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="container mt-3 bg-dark text-white" data-bs-theme="dark">
  <h2>Create New Post</h2>
  <?php $form = ActiveForm::begin() ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
<div class="form-group"> <?= Html::submitButton('create', ['class' => 'btn btn-primary']) ?> </div>
<?php ActiveForm::end(); ?>
</div>
