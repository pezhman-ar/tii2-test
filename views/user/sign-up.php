<?php
/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */     
/** @var app\models\LoginForm $model */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>
<div class="site-sign-up"> 
<?php $form = ActiveForm::begin(); ?> 
<?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'email')->input('email') ?>
<?= $form->field($model, 'password')->passwordInput() ?>
<div class="form-group"> <?= Html::submitButton('Sign Up', ['class' => 'btn btn-primary']) ?> </div>
<?php ActiveForm::end(); ?> 
</div>
