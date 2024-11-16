<?php   
namespace app\controllers;

use app\models\Category;
use Yii;
use app\models\UploadForm;
use yii\web\Controller;
use app\models\Post;
use yii\web\UploadedFile;

class PostController extends Controller
{
    public function actionIndex()
    {
        $posts = Post::find()->all();
        return $this->render('index', ['posts' => $posts]);
    }

    public function actionView($id){
        $post = Post::findOne($id);
        $file = $post->files;
        return $this->render('view',['post'=>$post,'file'=>$file]);
    }

    public function actionCreate() { 
        $model = new Post(); 
        $file = new UploadForm(); 
        $categories = Category::find()->all(); 
        $model->user_id = Yii::$app->user->id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) { 
            $file->imageFile = UploadedFile::getInstance($file, 'imageFile'); 
            if (!empty($file->imageFile)) { 
                $file->upload($model->id); 
            } 
            $categoryIds = Yii::$app->request->post('Post')['categoryIds']; 
            if (!empty($categoryIds)) { 
                foreach ($categoryIds as $categoryId) { 
                    $model->link('categories', Category::findOne($categoryId)); 
                } 
            } 
            return $this->redirect(['post/view', 'id' => $model->id]); 
        } 
        return $this->render('create', [
             'model' => $model, 
             'file' => $file, 
             'categories' => $categories, ]); 
        } 

    public function actionEdit($id){
        $user_id = Yii::$app->user->id;
        $model = Post::findOne($id);
        if($model->user_id == $user_id){
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
              return $this->render('edit', [ 'model' => $model]);
            }
        }
       

    public function actionDelete($id){
        $model = Post::findOne($id);
        $user_id = Yii::$app->user->id;
        if($model->user_id == $user_id){
            $model->delete();
            return $this->redirect(['user/profile']);
        }
    }

    }

