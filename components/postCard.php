<?php
namespace app\components;
use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class postCard extends Widget{
    public $article;

    public function init(){

    }

    public function run(){
        return $this->render('postcard',['article' => $this->article]);
    }
}
?>