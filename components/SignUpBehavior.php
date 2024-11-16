<?php
namespace app\components;

use yii\db\ActiveRecord;
use app\components\IncorrectMail;
use yii\base\Behavior;
use Yii;
use app\models\User;

class SignUpBehavior extends Behavior
{
    
    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_INSERT => 'sendMail',
            IncorrectMail::EVENT_FAKE_MAIL => 'sendAdminEmail',
        ];
    }
    
    public function sendMail($event)
    {
        
        $user = $event->sender;     
        Yii::$app->mailer->compose()
            ->setFrom('pejman.ardalani2@gmail.com')
            ->setTo($user->email)
            ->setSubject('Welcome to our blog site')
            ->setTextBody("Hi {$user->fullname}, thank you for signing up on our site.")
            ->send();
    }

    public function signUp()
    {
        $auth = Yii::$app->authManager;
        $model = new User();
        $model->scenario = 'signup';
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->password_hash = Yii::$app->getSecurity()->generatePasswordHash($model->password);
            $userRole = $auth->getRole('user');
            if ($model->save()) {
            $auth->assign($userRole, $model->id);
                // $this->trigger(IncorrectMail::EVENT_FAKE_MAIL, new Event(['sender' => $model]));
                     return $model; 
            }
        }
        
        return false;
    }

    public function sendAdminEmail($event){
        $user = $event->user;
        Yii::$app->mailer->compose()
        ->setFrom('pejman.ardalani2@gmail.com')
        ->setTo($event->adminMail)
        ->setSubject('Welcome to our blog site')
        ->setTextBody("admin {$user->fullname} with {$user->email} and username {$user->username } has signed up.")
        ->send();
    }

    
}
