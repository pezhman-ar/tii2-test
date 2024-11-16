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
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= Html::encode($user->id) ?></td>
                        <td><?= Html::encode($user->fullname) ?></td>
                        <td><?= Html::encode($user->username) ?></td>
                        <td><?= Html::a('View', ['user/view', 'id' => $user->id], ['class' => 'btn btn-primary']) ?></td>
                        <td><?= Html::a('edit', ['admin/user-edit', 'id' => $user->id], ['class' => 'btn btn-warning']) ?></td>
                        <td><?= Html::a('delete', ['admin/delete-user', 'id' => $user->id], ['class' => 'btn btn-danger']) ?></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </ul>
</div>
