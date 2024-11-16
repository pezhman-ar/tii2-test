<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */     
/** @var app\models\LoginForm $model */

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>
<div class="container mt-3 bg-dark text-white" data-bs-theme="dark">
  <h2>Create New Post</h2>
  <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'description')->textarea(['rows' => 5]) ?> 
    <?= $form->field($model, 'categoryIds')->checkboxList( ArrayHelper::map($categories, 'id', 'name') ) ?>
<div class="form-group"> <?= Html::submitButton('create', ['class' => 'btn btn-primary']) ?> </div>
<?php ActiveForm::end(); ?>
</div>
