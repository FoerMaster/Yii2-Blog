<?php

namespace app\models;
use yii\base\Model;
use yii\web\UploadedFile;

class ImageUpload extends Model
{
    public $image;

    public function rules()
    {
        return [
            [['image'],'required'],
            [['image'],'file','extensions' => 'jpg,png']
        ];
    }

    public function uploadFile(UploadedFile $file){
        $this->image = $file;
        if($this->validate()){

            $name = md5(uniqid($file->baseName)) . '.' . $file->extension;
            $file->saveAs(\Yii::getAlias('@web') .'uploads/'. $name);

            return $name;

        }
    }

}