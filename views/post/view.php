<?php
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = $post->title;
?>
<div class="container mt-4 bg-dark text-white p-4 rounded">
    <h1><?= Html::encode($this->title) ?></h1>
    <p><?= Html::encode($post->description) ?></p>
    <?php if ($post->files): ?>
        <div class="post-images">
             <?php foreach ($post->files as $file): ?> 
                <div class="post-image">
                     <img src="<?= Url::to('@web/' . $file->address) ?>" alt="Post Image" style="max-width: 100%;"> 
                </div>
             <?php endforeach; ?> 
        </div> 
        <?php endif; ?>
</div>
