<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Post extends ActiveRecord
{

    public $categoryIds = [];
    public static function tableName()
    {
        return 'post';
    }

    public function rules()
    {
        return [
            [['title', 'description'], 'required'],
            [['user_id'], 'integer'],
            [['categoryIds'], 'safe'],
            [['title'], 'string', 'max' => 30],
            [['description'], 'string', 'max' => 225],
          [['title','description'],'required','on'=>'edit'],
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getCategories(){
        return $this->hasMany(Category::class,['id'=>'category_id'])
        ->viaTable('category_post',['post_id'=>'id']);
    }

    public function getFiles()
    {
        return $this->hasMany(UploadForm::class, ['post_id' => 'id']);
    }
}
