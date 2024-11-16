<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;
use yii\db\ActiveRecord;

class UploadForm extends ActiveRecord
{
    // public $imageFiles;
    public $imageFile;


    public static function tableName()
    {
        return 'files';
    }

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg,jpeg'],
            [['post_id'], 'integer'],
            [['address'], 'string'],
        ];
    }

    public function getPost()
    {
        return $this->hasOne(Post::class, ['id' => 'post_id']);
    }

    public function upload($postId)
    {
        // var_dump($this->imageFile);die;
        if ($this->validate()) { 
            $filePath = 'uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
            if ($this->imageFile->saveAs($filePath)) {
                $newFile = new self();
                $newFile->post_id = $postId;
                $newFile->address = $filePath;
                $newFile->save(false);
            }
            return true;
        } else {
            return false;
        }
    }
}
