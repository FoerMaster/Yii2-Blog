<?php

/* @var $this yii\web\View */
use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = 'Foer Blog';
?>
<div class="site-index">
    <div class="body-content">

    <a style="text-decoration:none;" href="<?= Url::to(['post', 'id' => $toparticle->id]);?>">
        <div class='top-post-card'>
            <img src="<?= $toparticle->urlImage() ?>" >
            <div class="top-data">
                <h4><?= Html::encode($toparticle->title) ?></h4>
                <h3><?= Html::encode($toparticle->content)?></h3>
            </div>
            <div class="top-meta">
                <img src="<?= Yii::getAlias('@web').'/storage/'.$toparticle->getAuthorModel()->avatar ?>" >
                <p class="top-name"><?= $toparticle->getAuthorModel()->login?></p>
                <p class="top-date"><?= date("d.m.Y", strtotime($toparticle->date))?></p>
            </div>
        </div>
    </a>

    <hr class='c-hr'>

    <div class="row">
        <?php foreach($articles as $article):?>
            <a href="<?= Url::to(['post', 'id' => $article->id]);?>">
                <div class='post-card'>
                    <img src="<?= $article->urlImage() ?>" >
                    <div class="data">
                        <h4><?= Html::encode($article->title) ?></h4>
                        <h3><?= Html::encode($article->content)?></h3>
                    </div>
                    <div class="meta">
                        <img src="<?= Yii::getAlias('@web').'/storage/'.$article->getAuthorModel()->avatar ?>" >
                        <p class="name"><?= $article->getAuthorModel()->login?></p>
                        <p class="date"><?= date("d.m.Y", strtotime($article->date))?></p>
                    </div>
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


            <!--<div class="col-sm-4 col-md-4">
                <div class="thumbnail">
                    <div class="image-header" style="background-image: url(<?php //echo $article->urlImage() ?>);"></div>
                    <div class="caption">
                        <h3 style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><?php //echo Html::encode($article->title) ?></h3>
                        <p style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><?php //echo Html::encode($article->content)?></p>
                        <a href="/site/post?id=<?php //echo $article->id?>" class="" role="button">Читать полностью</a>
                        <p class="post-date"><?php //echo date("d.m.Y", strtotime($article->date))?> от <?php //echo Html::encode($article->getAuthorName())?></p>
                    </div>
                </div>
            </div>-->
