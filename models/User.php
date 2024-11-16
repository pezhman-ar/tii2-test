<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use app\components\SignUpBehavior;  
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
    public $password;
    // public $username;


    public function behaviors()
    {
        return [
            SignUpBehavior::class,
        ];
    }

    public function beforeSave($insert) {
         if (parent::beforeSave($insert)) {
             if ($this->isNewRecord) { 
                $this->auth_key = Yii::$app->security->generateRandomString(); 
            } return true; 
        } return false; 
    }

    public static function tableName()
    {
        return 'user';
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public function getPosts()
    {
        return $this->hasMany(Post::class, ['user_id' => 'id']);
    }

    public function rules() { 
        return [ [['email'], 'required'],
          [['email'], 'email'], 
          [['email', 'forget'], 'string', 'max' => 255], 
          ['email' ,'required' , 'on'=>'reset-password'],
          ['password','required','on'=>'newPassword'],
          [['username','email','fullname','password'],'required','on'=>'signup'],
          [['username','email','fullname'],'required','on'=>'edit']
    ];}

}
