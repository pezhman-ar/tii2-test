<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
</div>
    <div class="mt-3">
    <center>
    <h1>Welcome admin <?= Html::encode($user->username) ?></h1>  
    </center>
</div>
<br><br>
<center>
<div class="btn-group">
    
    <a type="button" class="btn btn-primary" href = "<?=Url::to(['admin/users-index']) ?>">Users controol</a>
    <a type="button" class="btn btn-primary" href = "<?=Url::to(['admin/posts-index']) ?>">Posts controll</a>
  </div> 
</center>
