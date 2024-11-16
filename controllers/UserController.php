<?php
namespace app\controllers;

use app\classes\trigger;
use app\components\IncorrectMail;
use Yii;
use yii\web\Controller;
use app\models\User;
use yii\base\Event;
use yii\data\Pagination;

class UserController extends Controller
{

    public function actionIndex()
    {
        $users = User::find()->all();
        //  $pagination = new Pagination([
        //     'defaultPageSize' => 10,
        //     'totalCount' => $users->count(),
        // ]);
        // $users = $users->orderBy('id')
        // ->offset($pagination->offset)
        // ->limit($pagination->limit)
        // ->all();
        return $this->render('index', ['users' => $users,
        // 'pagination' => $pagination
    ]);
    }

    public function actionView($id)
    {
        $user = User::findOne($id);
    
        return $this->render('view', ['user' => $user]);
    }

    public function actionProfile()
    {
        if (!Yii::$app->user->isGuest) {
            $user = Yii::$app->user->identity;
            $userId = $user->id;
            $username = $user->username;
            $email = $user->email;
            $posts = $user->posts;
            $admin = $user->is_admin;

            return $this->render('profile', [
                'is_admin'=>$admin,
                'user_id' => $userId,
                'username' => $username,
                'email' => $email,
                'posts'=>$posts
            ]);
        } else {
            return $this->redirect(['site/login']);
        }
    }

        public function sentEmail($email,$hash){
            $link = Yii::$app->urlManager->createAbsoluteUrl(['user/reset-password', 'token' => $hash]);
            Yii::$app->mailer->compose()
            ->setFrom('pejman.ardalani2@gamil.com')
            ->setTo($email)
            ->setSubject('Treset password')
            ->setTextBody("click here $link")
            ->send();
            
        }

        public function actionForget() { 
                $model = new User();
                $model->scenario ='reset-password';
                if ($model->load(Yii::$app->request->post()) && $model->validate()) { 
                    $email = $model->email;
                    $randomString = Yii::$app->getSecurity()->generateRandomString();
                    $hash = Yii::$app->getSecurity()->generatePasswordHash($randomString);
                    $user = User::find()->where(['email' => $email])->one();
                    $user->forget = $hash;
                            if ($user->save()) {
                                $this->sentEmail($email,$hash);
                            return $this->redirect(['site/login']);
                        } else { 
                            Yii::$app->session->setFlash('error', 'User not found.'); 
                        }
                    } return $this->render('forget', [ 'model' => $model, 
                    ]);
                }

        public function actionResetPassword($token){
            $user = User::find()->where(['forget' => $token])->one();
            $user->scenario ='newPassword';
            $user->password_hash = '';
            // var_dump(Yii::$app->request->post()['User']);die;
            if ($user->load(Yii::$app->request->post()) && $user->validate()) { 
                $user->password_hash = Yii::$app->getSecurity()->generatePasswordHash($user->password);
                if ($user->save()) { 
                    Yii::$app->session->setFlash('success', 'Password has been reset.');
                     return $this->redirect(['site/login']);
                     } else { Yii::$app->session->setFlash('error', 'Failed to reset the password.'); 
            }
        }
        return $this->render('reset-password', [ 
            'model' => $user ]);
        }

    
        public function actionSignUp() { 
            $user = new User();
            $result =  $user->signUp();
            if ($result) { 
                $event = new IncorrectMail();
                $event->user = $result;
                $user->trigger(IncorrectMail::EVENT_FAKE_MAIL,new IncorrectMail($event));
                // Yii::$app->user->trigger(IncorrectMail::EVENT_FAKE_MAIL, new IncorrectMail());
            return $this->redirect(['user/profile']); 
            } return $this->render('sign-up', ['model' => $user]); 
        }
    }
