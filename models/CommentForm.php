<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Comments;
class CommentForm extends Model
{
    public $content;
    public $article_id;
    /**
     * @var mixed
     */


    public function rules()
    {
        return [
            [['content'], 'required'],
            [['article_id'], 'required'],
            [['content'], 'string', 'length' => [3,250]]
        ];
    }

    public function save()
    {
        $comment = new Comments;
        $comment->content = $this->content;
        $comment->author = !Yii::$app->user->isGuest ? Yii::$app->user->id : 1;
        $comment->article_id = $this->article_id;
        $comment->date = date('Y-m-d');
        $comment->save();
        return $comment;

    }
}