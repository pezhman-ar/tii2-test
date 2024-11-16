<?php   
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Category;

class CategoryController extends Controller
{

    
    public function actionCreate(){
        if(Yii::$app->user->can('createCategory')){
            $category = new Category();
        if($category->load(Yii::$app->request->post())){
            if($category->save()){
                return $this->redirect(['index']);
            }
        }
        return $this->render('create',['model'=>$category]);
        }else{
            return $this->redirect(['index']);
        }
        
    }
    

    public function actionIndex(){
        $categories =Category::find()->all();
        return $this->render('index',['categories'=>$categories]);
    }

    
    
    public function actionDelete($id){
        if(Yii::$app->user->can('deleteCategory')){
            Category::findOne($id)->delete();
            return $this->redirect(['index']);
        }else{
            return $this->redirect(['site/index']);
        }
    }
}