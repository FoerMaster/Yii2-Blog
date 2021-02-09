<?php

/* @var $this yii\web\View */
use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = 'Foer Blog';
?>
<div class="site-index">
    <div class="body-content">

    <div class="row">
        <?php foreach($articles as $article):?>
            <a class="goto-post" href="<?= Url::to(['post', 'id' => $article->id]);?>">
                <div class='post-card'>
                    <img src="<?= $article->urlImage() ?>" >
                    <div class="data">
                        <h4><?= Html::encode($article->title) ?></h4>
                        <h3><?= Html::encode($article->content)?></h3>
                    </div>
                    
                    <a href="<?= Url::to(['/profile', 'id' => $article->getAuthorModel()->id]);?>" class="meta">
                        <img src="<?= Yii::getAlias('@web').'/storage/'.$article->getAuthorModel()->avatar ?>" >
                        <p class="name"><?= $article->getAuthorModel()->login?></p>
                        <p class="date"><?= date("d.m.Y", strtotime($article->date))?></p>
                    </a>
                </div>
            </a>
        <?php endforeach;?>
    </div>
    <?php
    echo LinkPager::widget([
        'pagination' =>$pagination,
    ]);
    ?>
    </div>
</div>
