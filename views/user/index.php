<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
<div class="container mt-4 bg-dark text-white p-4 rounded"  >
    <h1>Posts</h1>
    <ul>
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
                <?php foreach($users as $user): ?>
                    <tr>
                        <td><?= Html::encode("{$user->id}") ?></td>
                        <td><?= Html::encode("{$user->fullname}") ?></td>
                        <td><?= Html::encode("{$user->username}") ?></td>
                        <td><?= Html::a('View', ['user/view', 'id' => $user->id], ['class' => 'btn btn-primary']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </ul>
    <!--  LinkPager::widget(['pagination' => $pagination])  -->
</div>
