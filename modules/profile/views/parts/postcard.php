<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<a class="goto-post" href="<?= Url::to(['../post', 'id' => $article->id]);?>">
    <div class='post-card'>
        <img src="<?= $article->urlImage() ?>" >
        <div class="data">
            <h4><?= Html::encode($article->title) ?></h4>
            <h3><?= Html::encode($article->content)?></h3>
        </div>
        
        <a href="<?= Url::to(['/profile', 'id' => $article->getAuthorModel()->id]);?>" class="meta">
            <img src="<?= Yii::getAlias('@web').$article->getAuthorModel()->urlImage() ?>" >
            <p class="name"><?= $article->getAuthorName()?></p>
            <p class="date"><?= date("d M Y", strtotime($article->date))?></p>
            
        </a>
        <? if($article->getAuthorModel()->id == Yii::$app->user->identity->id) echo "<a href='".Url::to(["articles/view",'id' => $article->id])."' class='chernovik'><i class='fas fa-pen-nib'></i></a>"; ?>
        <? if($article->getAuthorModel()->id == Yii::$app->user->identity->id && $article->status == 0) echo "<a href='".Url::to(["articles/view",'id' => $article->id])."' class='inv'><i class='fas fa-eye-slash'></i></a>"; ?>
    </div>
</a>