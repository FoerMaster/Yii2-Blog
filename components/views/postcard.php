<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<a class="goto-post" href="<?= Url::to(['../post', 'id' => $article->id]);?>">
    <div class='post-card'>
        <?php if ($article->urlImage() != '/storage/no-image.png'): ?>
            <img src="<?= $article->urlImage() ?>" >
        <?php else: ?>
            <img src="/images/no-image.png" >
        <?php endif; ?>
        
        <div class="data">
            <h4><?= Html::encode($article->title) ?></h4>
            <h3><?= Html::encode($article->content)?></h3>
        </div>
        
        <a href="<?= Url::to(['/profile', 'id' => $article->getAuthorModel()->id]);?>" class="meta">
            <img src="<?= Yii::getAlias('@web').$article->getAuthorModel()->urlImage() ?>" >
            <p class="name"><?= $article->getAuthorName()?></p>
            <p class="date"><?= date("d M Y", strtotime($article->date))?></p>
            
        </a>
    </div>
</a>