<?php

namespace app\models;
use yii\web\NotFoundHttpException;
use app\models\User;
use app\models\Comments;
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
            [['title','content'],'string'],
            [['date'],'date','format'=>'php:Y-m-d'],
            [['date'],'default','value'=>date('Y-m-d')],
            [['title'],'string','max'=>255]
        ];
    }

    public function getAuthorName()
    {
        return $this->findUser($this->author)->login;
    }

    public function getAuthorModel()
    {
        return $this->findUser($this->author);
    }

    protected function findUser($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Ошибка базы данных!.');
    }

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

        if($image && $this->image != "no-image.png"){
            unlink($image);
        }
    }

    public function beforeDelete()
    {
        $this->delImage();
        return parent::beforeDelete();
    }
    public function HasAccess(){
        return (Yii::$app->user->identity->is_admin == 1) ? (True) : (Yii::$app->user->identity->id == $this->author);
    }

    public function getComments()
    {
        return Comments::find()->where('article_id = :id', [':id' => $this->id]);
    }

    public function setStatus($status = 1)
    {
        $this->status = $status;
        return $this->save(false);
    }
}
