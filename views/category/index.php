<?php
use yii\helpers\Html;
?>

<div class="container mt-4 bg-dark text-white p-4 rounded">
    <h1>Categories</h1>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <?php if (!Yii::$app->user->isGuest && Yii::$app->user->can('deletePost')) : ?>
                <th>delete</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category): ?>
                <tr>
                    <td><?= Html::encode($category->id) ?></td>
                    <td><?= Html::encode($category->name) ?></td>
                    <?php if (!Yii::$app->user->isGuest && Yii::$app->user->can('deletePost')) : ?>
                    <td>
                        <?= Html::a('Delete', ['category/delete', 'id' => $category->id], ['class' => 'btn btn-danger',]) ?>
                    </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
