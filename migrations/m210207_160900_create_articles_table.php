<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%articles}}`.
 */
class m210207_160900_create_articles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%articles}}', [
            'id' =>             $this->primaryKey(),
            'author' =>         $this->integer(),
            'status' =>         $this->integer()->defaultValue(0),
            'title' =>          $this->string(),
            'content' =>        $this->text(),
            'image' =>          $this->string()->defaultValue("no-image.png"),
            'date' =>           $this->date(),
        ]);
             
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%articles}}');
    }
}
