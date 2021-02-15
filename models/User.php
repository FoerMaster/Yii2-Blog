<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string|null $login
 * @property string|null $email
 * @property string|null $password
 * @property int|null $is_admin
 * @property string|null $avatar
 */
class User extends ActiveRecord implements IdentityInterface
{

    public static function tableName()
    {
        return '{{%user}}';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public static function findByUsername($login)
    {
        return static::findOne(['login' => $login]);
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }
 
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }
 
    function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /* IMAGE LOGIC */
    public function getImage(){
        $File = Yii::getAlias('@web').'storage/'.$this->avatar;
        if(file_exists($File) && !empty($this->avatar) && $this->avatar != "no-avatar.svg"){
            return $File;
        }
        return false;
    }

    public function saveImage($fn){
        $this->avatar = $fn;
        return $this->save(false);
    }

    public function urlImage()
    {
        return '/storage/' . $this->avatar;
    }

    public function delImage()
    {
        $avatar = $this->getImage();
        if($avatar){
            unlink($avatar);
        }
    }

    public function beforeDelete()
    {
        $this->delImage();
        return parent::beforeDelete();
    }

    public function getPosts()
    {
        return Articles::find()->where('author = :id', [':id' => $this->id]);
    }
}
