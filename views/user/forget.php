<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */     
/** @var app\models\LoginForm $model */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>
<div class="container mt-3 bg-dark text-white" data-bs-theme="dark"> 
    <h2> enter your email</h2> 
    <?php $form = ActiveForm::begin(); ?>
     <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?> 
     <?= $form->errorSummary($model); ?> <div class="form-group"> 
        <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?> 
    </div> <?php ActiveForm::end(); ?> 
</div> 