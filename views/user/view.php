<?php
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = $user->username;
?>
<div class="container mt-4 bg-dark text-white p-4 rounded">
    <h1><?= Html::encode($user->username) ?></h1>
    <table class="table table-dark table-striped" >
            <thead>
                <tr>
                    <th>id</th>
                    <th>full name</th>
                    <th>username</th>
                    <th>full page</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($user->posts as $posts): ?>
                    <tr>
                    <td><?= Html::encode("{$posts->id}") ?></td>
                        <td><?= Html::encode("{$posts->title}") ?></td>
                        <td><?= Html::encode("{$posts->description}") ?></td>
                        <td><?= Html::a('View', ['post/view', 'id' => $posts->id], ['class' => 'btn btn-primary']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
</div>
