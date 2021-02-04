<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "art".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $desc
 * @property string|null $content
 * @property string|null $img
 * @property int|null $views
 * @property int|null $uid
 * @property int|null $status
 * @property string|null $date
 */
class Art extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'art';
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

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'desc' => 'Desc',
            'content' => 'Content',
            'img' => 'Img',
            'views' => 'Views',
            'uid' => 'Uid',
            'status' => 'Status',
            'date' => 'Date',
        ];
    }
    public function saveImage($fn){
        $this->img = $fn;
        return $this->save(false);
    }

    /*
    Получение пути до картинки, если нет то даем False
    */
    public function getImage(){
        $File = Yii::getAlias('@web').'uploads/'.$this->img;
        if(file_exists($File) && !empty($this->img)){
            return $File;
        }
        return false;
    }

    public function urlImage()
    {
        return '/uploads/' . $this->img;
    }

    public function delImage()
    {
        $img = $this->getImage();
        if($img){
            unlink($img);
        }
    }

    public function beforeDelete()
    {
        $this->delImage();
        return parent::beforeDelete();
    }
}
