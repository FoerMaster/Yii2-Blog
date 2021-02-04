<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%art}}`.
 */
class m210204_055114_create_art_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%art}}', [
            'id' =>         $this->primaryKey(),
            'title' =>      $this->string(),
            'desc' =>       $this->text(),
            'content' =>    $this->text(),
            'img' =>        $this->string(),
            'views' =>      $this->integer(),
            'uid' =>        $this->integer(),
            'status' =>     $this->integer(),
            'date' =>       $this->date(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%art}}');
    }
}
