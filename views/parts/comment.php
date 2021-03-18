<?php
/**
 * @var $comment
 */
use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class='comment-card'>
    <a href="<?= Url::to(['/profile', 'id' => $comment->getAuthorModel()->id]);?>">
        <div class="meta">
            <?php if(!empty(Yii::$app->user->identity->id) && $comment->getAuthorModel()->id == Yii::$app->user->identity->id || Yii::$app->user->identity->is_admin): ?>
                <?= Html::a('<i class="fas fa-trash-alt"></i>', ['site/delc', 'id' => $comment->id],['class'=>'delete-mess-btn']) ?>
            <?php endif;?>
            <?= Html::img('@web/storage/'.$comment->getAuthorModel()->avatar, ['alt' => 'Картинка']) ?>
            <?= Html::tag('p', Html::encode( $comment->getAuthorModel()->login), ['class' => 'name']) ?>
            <?= Html::tag('p', Html::encode( date("d M Y", strtotime($comment->date))), ['class' => 'date']) ?>

        </div>
    </a>
    <div class="data">
        <?= Html::tag('h3', Html::encode($comment->content)) ?>
    </div>
</div>