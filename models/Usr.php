<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usr".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $password
 * @property int|null $usergroup
 * @property string|null $email
 * @property string|null $avatar
 */
class Usr extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usr';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usergroup'], 'integer'],
            [['name', 'password', 'email', 'avatar'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'password' => 'Password',
            'usergroup' => 'Usergroup',
            'email' => 'Email',
            'avatar' => 'Avatar',
        ];
    }
}
