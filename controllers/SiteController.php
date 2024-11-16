<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\LoginForm; 
use yii\web\ErrorAction;
use yii\helpers\Url;

class SiteController extends Controller
{
    public function actionIndex() { 
        
        return $this->render('index'); 
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => ErrorAction::class,
            ],
        ];
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(Url::to(['post/index']));
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(Url::to(['user/index']));
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect(Url::to(['site/login']));
    }
}
