<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
<div class="container mt-4 bg-dark text-white p-4 rounded">
    <h1>Users</h1>
    <ul>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Profile</th>
                    <th>edit</th>
                    <th>delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $post): ?>
                    <tr>
                        <td><?= Html::encode($post->id) ?></td>
                        <td><?= Html::encode($post->title) ?></td>
                        <td><?= Html::encode($post->description) ?></td>
                        <td><?= Html::a('View', ['post/view', 'id' => $post->id], ['class' => 'btn btn-primary']) ?></td>
                        <td><?= Html::a('edit', ['admin/post-edit', 'id' => $post->id], ['class' => 'btn btn-warning']) ?></td>
                        <td><?= Html::a('delete', ['admin/delete-post', 'id' => $post->id], ['class' => 'btn btn-danger']) ?></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </ul>
</div>
