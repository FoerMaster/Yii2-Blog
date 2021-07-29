<?php

use yii\db\Migration;
use app\models\User;
/**
 * Handles the creation of table `{{%user}}`.
 */
class m210207_160939_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' =>         $this->primaryKey(),
            'login' =>      $this->string(),
            'email' =>      $this->string(),
            'auth_key' =>   $this->string(),
            'password_hash' => $this->string(),
            'is_admin' =>   $this->integer()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'avatar' =>     $this->string()->defaultValue("no-avatar.svg"),
        ]);

        $model = new User();
        $model->login = 'Гость';
        $model->email = 'guest@blog.com';
        $model->auth_key = 'K3r-CjTFXx4ket32HUFWcWi1PGDW3AwQ';
        $model->password_hash = 'cant-login';
        $model->is_admin = 0;
        $model->created_at = 0;
        $model->updated_at = 0;
        $model->avatar = "no-avatar.svg";
        $model->save(); /* Я не нашел как сделать это по другому в Yii2 */
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
