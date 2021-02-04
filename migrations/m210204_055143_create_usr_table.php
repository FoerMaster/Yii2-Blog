<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%usr}}`.
 */
class m210204_055143_create_usr_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%usr}}', [
            'id' =>         $this->primaryKey(),
            'name'=>        $this->string(),
            'password' =>   $this->string(),
            'usergroup'=>   $this->integer()->defaultValue(0),
            'email'=>       $this->string()->defaultValue(null),
            'avatar'=>      $this->string()->defaultValue(null)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%usr}}');
    }
}
