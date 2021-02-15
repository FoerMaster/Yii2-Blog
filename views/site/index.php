<?php

/* @var $this yii\web\View */
use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = 'Foer Blog';
?>

<div class="site-index">
    <?= $this->render('/parts/filter',['users' => $users ,'filters' => $filters]); ?> 
    <div class="body-content  animate__animated animate__fadeIn">
        <div class="row">
            <?php foreach($articles as $article):?>
                <?= $this->render('/parts/postcard',['article' => $article]); ?>
            <?php endforeach;?>
        </div>
        <?= LinkPager::widget(['pagination' =>$pagination,]);?>
    </div>
</div>
