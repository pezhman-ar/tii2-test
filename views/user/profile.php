<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
    <div class="mt-3">
    <center>
    <h1>Welcome <?= Html::encode($username) ?></h1>  
    </center>
</div>

    <div class="container mt-4 bg-dark text-white p-4 rounded"  >
    <h1>your posts</h1><?= Html::a('create new post', ['post/create'], ['class' => 'btn btn-primary']) ?>     
    <ul>
        <table class="table table-dark table-striped" >
            <thead>
                <tr>
                    <th>title</th>
                    <th>description</th>
                    <th>full page</th>
                    <th>edit</th>
                    <th>delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($posts as $post): ?>
                    <tr>
                        <td><?= Html::encode("{$post->title}") ?></td>
                        <td><?= Html::encode("{$post->description}") ?></td>
                        <td><?= Html::a('View', ['post/view', 'id' => $post->id], ['class' => 'btn btn-primary']) ?></td>
                        <td><?= Html::a('edit', ['post/edit', 'id' => $post->id], ['class' => 'btn btn-warning']) ?></td>
                        <td><?= Html::a('delete ', ['post/delete', 'id' => $post->id], ['class' => 'btn btn-danger']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </ul>
</div>


</nav>
