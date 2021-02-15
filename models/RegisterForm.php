<?php

namespace app\models;

use Yii;

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
class RegisterForm extends \yii\db\ActiveRecord
{
    public $login;
    public $email;
    public $password;
 
    public function rules()
    {
        return [
            ['login', 'required'],
            ['login', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Этот ник уже взяли!.'],
            ['login', 'string', 'min' => 2, 'max' => 255],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Эту почту уже взяли.'],
            ['password', 'required'],
        ];
    }
 

    public function register()
    {
 
        if (!$this->validate()) {
            return null;
        }
 
        $user = new User();
        $user->login = $this->login;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        return $user->save() ? $user : null;
    }
}
