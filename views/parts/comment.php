<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class='comment-card'>
    <div class="meta">
        <?= Html::img('@web/storage/'.$comment->getAuthorModel()->avatar, ['alt' => 'Картинка']) ?>
        <?= Html::tag('p', Html::encode( $comment->getAuthorModel()->login), ['class' => 'name']) ?>
        <?= Html::tag('p', Html::encode( date("d M Y", strtotime($comment->date))), ['class' => 'date']) ?>
    </div>
    <div class="data">
        <?= Html::tag('h3', Html::encode($comment->content)) ?>
    </div>
</div>