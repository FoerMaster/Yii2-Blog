<?php
/**
 * @var $article
 * @var $pagination
 * @var $commentForm
 * @var $comments
 */
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $article->title;
?>
<div class="site-index">
    <?php if(!empty(Yii::$app->user->identity->id) && $article->getAuthorModel()->id == Yii::$app->user->identity->id || Yii::$app->user->identity->is_admin): ?>
        <div class="toolbox">
            <?= Html::a('<i class="far fa-edit"></i>', ['profile/articles/update', 'id' => $article->id]) ?>
            <?php if($article->status == 0): ?>
                <?= Html::a('<i class="fas fa-upload"></i>', ['profile/articles/publish', 'id' => $article->id]) ?>
            <?php endif;?>
            <?= Html::a('<i class="fas fa-file-image"></i>', ['profile/articles/upimage', 'id' => $article->id]) ?>
            <?= Html::a('<i class="fas fa-trash-alt"></i>', ['profile/articles/delete', 'id' => $article->id]) ?>
        </div>
    <?php endif;?>
    <div class="body-content" style="color:white">
        <div class="mob-top word-warp visible-xs">
            <h1 class="v-post-title"><?php echo $article->title?></h1>

            <a href="<?= Url::to(['/profile', 'id' => $article->getAuthorModel()->id]);?>" class="meta">
                <p><?= Html::img('@web/storage/'.$article->getAuthorModel()->avatar, ['alt' => 'Картинка']) ?></p>

                <?= Html::tag('p', Html::encode( $article->getAuthorModel()->login), ['class' => 'name']) ?>
                <?= Html::tag('p', Html::encode( date("d.m.Y", strtotime($article->date))), ['class' => 'date']) ?>
            </a>
        </div>
        <div class="v-post-image-overlay hidden-xs">
            <?php
            if($article->getImage()){
                echo Html::img($article->urlImage(), ['alt' => 'Картинка','class'=>'v-post-image']);
            }
            ?>
            <h1 class="v-post-title"><?php echo $article->title?></h1>

            <a href="<?= Url::to(['/profile', 'id' => $article->getAuthorModel()->id]);?>" class="meta">
                <p><?= Html::img('@web/storage/'.$article->getAuthorModel()->avatar, ['alt' => 'Картинка']) ?></p>

                <?= Html::tag('p', Html::encode( $article->getAuthorModel()->login), ['class' => 'name']) ?>
                <?= Html::tag('p', Html::encode( date("d.m.Y", strtotime($article->date))), ['class' => 'date']) ?>
            </a>
        </div>

        <div class="v-post-content"><?= $article->content?></div>

        <hr class='c-hr'>


        <?=LinkPager::widget(['pagination' =>$pagination,]);?>

        <?php $form = ActiveForm::begin([
            'id' => 'comForm',
            'action' => 'site/comment',
            'method'=>'post',
            'enableAjaxValidation' => false,

            'options'=>['class'=>'form-horizontal contact-form']])?>

            <div class="form-group comment-form">
                <div class="col-md-12">
                    <div id="comments">
                        <?php foreach($comments as $comment):?>
                            <?= $this->render('/parts/comment',['comment' => $comment]); ?>
                        <?php endforeach;?>
                    </div>
                    <?= $form->field($commentForm, 'article_id')->hiddenInput(['value' => $article->id])->label(false)?>
                    <?= $form->field($commentForm, 'content')->textarea(['class'=>'form-control-c','placeholder'=>'Напишите сообщение...'])->label(false)?>
                </div>
                <button type="submit" class="button-prim w-full" >Отправить</button>
            </div>

        <?php ActiveForm::end();?>
    </div>
</div>
