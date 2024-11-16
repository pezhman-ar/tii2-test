<?php

namespace app\models;

use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function tableName(){
        return 'categories';
    }

    public function getPosts(){
        return $this->hasMany(Post::class,['id'=>'post_id'])
        ->viaTable('category_post',['category_id'=>'id']);
        ;
    }

    public function rules()
    {
        return[
            [['name'],'required']
        ];
    }
}