<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "articles".
 *
 * @property int $id
 * @property int|null $author
 * @property string|null $content
 * @property string|null $image
 * @property string|null $date
 */
class Articles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'articles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'],'required'],
            [['title','desc','content'],'string'],
            [['date'],'date','format'=>'php:Y-m-d'],
            [['date'],'default','value'=>date('Y-m-d')],
            [['title'],'string','max'=>255]
        ];
    }

    /*
    Получение пути до картинки, если нет то даем False
    */
    public function getImage(){
        $File = Yii::getAlias('@web').'storage/'.$this->image;
        if(file_exists($File) && !empty($this->image)){
            return $File;
        }
        return false;
    }

    public function saveImage($fn){
        $this->image = $fn;
        return $this->save(false);
    }

    public function urlImage()
    {
        return '/storage/' . $this->image;
    }

    public function delImage()
    {
        $image = $this->getImage();
        if($image){
            unlink($image);
        }
    }

    public function beforeDelete()
    {
        $this->delImage();
        return parent::beforeDelete();
    }

}