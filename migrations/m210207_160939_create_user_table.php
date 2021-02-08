<?php

use yii\db\Migration;

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
            'avatar' =>     $this->string()->defaultValue("http://blog.com.test/storage/no-avatar.svg"),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
