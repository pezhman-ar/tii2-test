<?php
namespace app\controllers;

use app\models\LoginForm;
use app\models\Post;
use app\models\User;
use Yii;
use yii\web\Controller;

class AdminController extends Controller{

    public function isAdmin(){
        if (!Yii::$app->user->isGuest) {
            $user = Yii::$app->user->identity;
            if ($user->is_admin == 'yes'){
            return true;
            }else{
                return false;
            }
    }
}

    public function actionIndex(){
        // var_dump($this->isAdmin());die;
        $user = Yii::$app->user->identity;  
        if ($this->isAdmin() == true) { 
            return $this->render('index', ['user'=>$user]);
        }else{
            return $this->redirect(['site/index']);
        }
    }

    public function actionUsersIndex(){
        if($this->isAdmin() == true){
            $users = User::find()->all();
            return $this->render('users-index', ['users' => $users]);
        }else{
            return $this->redirect(['site/index']);
        }
    }

    public function actionDeleteUser($id){
        if(Yii::$app->user->can('deleteUser')){
            Post::deleteAll(['user_id' => $id]);
            User::findOne($id)->delete();
            return $this->redirect(['users-index']);
        }else{
            return $this->redirect(['site/index']);
        }
    }

    public function actionUserEdit($id){
        if($this->isAdmin() == true){
            $user = User::findOne($id);
            $user->scenario = 'edit';
            if ($user->load(Yii::$app->request->post()) && $user->save()) {
                return $this->redirect(['user/view', 'id' => $user->id]);
            }
            return $this->render('user-edit', [ 'model' => $user]);

        }else{
            return $this->redirect(['site/index']);
        }
    }

    public function actionPostsIndex(){
        if($this->isAdmin() == true){
            $posts = Post::find()->all();
            return $this->render('posts-index', ['posts' => $posts]);
        }else{
            return $this->redirect(['site/index']);
        }
    }

    public function actionPostEdit($id){
        if($this->isAdmin() == true){
            $post = Post::findOne($id);
            $post->scenario = 'edit';
            if ($post->load(Yii::$app->request->post()) && $post->save()) {
                return $this->redirect(['post/view', 'id' => $post->id]);
            }
            return $this->render('post-edit', [ 'model' => $post]);

        }else{
            return $this->redirect(['site/index']);
        }
    }

    public function actionDeletePost($id){
        if(Yii::$app->user->can('deletePost')){
            Post::findOne($id)->delete();
            return $this->redirect(['posts-index']);
        }else{
            return $this->redirect(['site/index']);
        }
    }   
        
}