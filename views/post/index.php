<?php
use yii\helpers\Html;
?>
<div class="container mt-4 bg-dark text-white p-4 rounded"  >
    <h1>Posts</h1>
    <ul>
        <table class="table table-dark table-striped" >
            <thead>
                <tr>
                    <th>id</th>
                    <th>title</th>
                    <th>description</th>
                    <th>full page</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($posts as $post): ?>
                    <tr>
                        <td><?= Html::encode("{$post->id}") ?></td>
                        <td><?= Html::encode("{$post->title}") ?></td>
                        <td><?= Html::encode("{$post->description}") ?></td>
                        <td><?= Html::a('View', ['post/view', 'id' => $post->id], ['class' => 'btn btn-primary']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </ul>
</div>
