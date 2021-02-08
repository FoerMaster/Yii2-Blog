<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Comments;
class CommentForm extends Model
{
    public $content;
    
    public function rules()
    {
        return [
            [['content'], 'required'],
            [['content'], 'string', 'length' => [3,250]]
        ];
    }

    public function saveComment($article_id)
    {
        $comment = new Comments;
        $comment->content = $this->content;
        $comment->author = !Yii::$app->user->isGuest ? Yii::$app->user->id : 2;
        $comment->article_id = $article_id;
        $comment->date = date('Y-m-d');
        return $comment->save();

    }
}