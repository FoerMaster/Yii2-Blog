<?php


use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class='comment-card'>
    <div class="meta">
        <img src="<?= Yii::getAlias('@web').'/storage/'.$comment->getAuthorModel()->avatar ?>" >
        <p class="name"><?= $comment->getAuthorModel()->login?></p>
        <p class="date"><?= date("d M Y", strtotime($comment->date))?></p>
    </div>
    <div class="data">
        <h3><?= Html::encode($comment->content) ?></h3>
    </div>
</div>