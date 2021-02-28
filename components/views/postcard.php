<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
?>
<a class="goto-post" href="<?= Url::to(['../post', 'id' => $article->id]);?>">
    <div class='col-sm-4 post-card'>
        <?php if ($article->urlImage() != '/storage/no-image.png'): ?>
            <img src="<?= $article->urlImage() ?>"  alt="">
        <?php else: ?>
            <img src="/images/no-image.png"  alt="">
        <?php endif; ?>
        
        <div class="data">
            <h4><?= Html::encode($article->title) ?></h4>
            <h3><?= Html::encode(strip_tags($article->content))?></h3>
        </div>
        
        <a href="<?= Url::to(['/profile', 'id' => $article->getAuthorModel()->id]);?>" class="meta">
            <img src="<?= Yii::getAlias('@web').$article->getAuthorModel()->urlImage() ?>"  alt="">
            <p class="name"><?= $article->getAuthorName()?></p>
            <p class="date"><?= date("d M Y", strtotime($article->date))?></p>
            
        </a>
    </div>
</a>