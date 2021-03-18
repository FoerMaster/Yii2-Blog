<?php
namespace app\widgets;
use yii\base\Widget;

class PostCard extends Widget{
    public $article;

    public function run(){
        return $this->render('postcard',['article' => $this->article]);
    }
}