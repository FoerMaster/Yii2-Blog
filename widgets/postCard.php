<?php
namespace app\components;
use yii\base\Widget;

class postCard extends Widget{
    public $article;

    public function run(){
        return $this->render('postcard',['article' => $this->article]);
    }
}