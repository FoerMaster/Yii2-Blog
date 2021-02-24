<?php

use yii\db\Migration;
use app\models\Articles;
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

        $model = new Articles();
        $model->author = 1;
        $model->status = 1;
        $model->title = 'Тестовый пост для блога';
        $model->content = 'Тут типо годный контент, но я не знаю что писать по этому пишу всякий бред :)';
        $model->image = "no-image.png";
        $model->save(); /* Я не нашел как сделать это по другому в Yii2 */

        $model = new Articles();
        $model->author = 1;
        $model->status = 1;
        $model->title = 'Еще один пост для блога';
        $model->content = 'Тут типо годный контент, но я не знаю что писать по этому пишу всякий бред :)';
        $model->image = "no-image.png";
        $model->save(); /* Я не нашел как сделать это по другому в Yii2 */

        $model = new Articles();
        $model->author = 1;
        $model->status = 1;
        $model->title = 'Ну и еще один';
        $model->content = 'Тут типо годный контент, но я не знаю что писать по этому пишу всякий бред :)';
        $model->image = "no-image.png";
        $model->save(); /* Я не нашел как сделать это по другому в Yii2 */

        $model = new Articles();
        $model->author = 1;
        $model->status = 1;
        $model->title = 'Крутаааа!';
        $model->content = 'Тут типо годный контент, но я не знаю что писать по этому пишу всякий бред :)';
        $model->image = "no-image.png";
        $model->save(); /* Я не нашел как сделать это по другому в Yii2 */

        $model = new Articles();
        $model->author = 1;
        $model->status = 1;
        $model->title = 'Хз как но это работает!!';
        $model->content = 'Тут типо годный контент, но я не знаю что писать по этому пишу всякий бред :)';
        $model->image = "no-image.png";
        $model->save(); /* Я не нашел как сделать это по другому в Yii2 */
             
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%articles}}');
    }
}
