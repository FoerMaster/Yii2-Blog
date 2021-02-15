<?php

/* @var $this yii\web\View */
use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $article->title;
?>
<div class="site-index">

    <div class="body-content" tyle="color:white">
        <div class="v-post-image-overlay">
            <?php if($article->getImage()){echo '<img src='.$article->urlImage().' class="v-post-image">';}?>
            <h1 class="v-post-title"><?php echo $article->title?></h1>

            <a href="<?= Url::to(['/profile', 'id' => $article->getAuthorModel()->id]);?>" class="meta">
                <p><img src="<?= Yii::getAlias('@web').'/storage/'.$article->getAuthorModel()->avatar ?>" ></p>
                <p class="name"><?= $article->getAuthorModel()->login?></p>
                <p class="date"><?= date("d.m.Y", strtotime($article->date))?></p>
            </a>
        </div>

        <?$parser2 = new JBBCode\Parser();
        $parser2->addCodeDefinitionSet(new JBBCode\DefaultCodeDefinitionSet());
        $parser2->parse(Html::encode($article->content));?>

        <div class="v-post-content"><?= $parser2->getAsHtml()?></div>

        <hr class='c-hr'>

        <?php foreach($comments as $comment):?>
            <?= $this->render('/parts/comment',['comment' => $comment]); ?>
        <?php endforeach;?>

        <?=LinkPager::widget(['pagination' =>$pagination,]);?>
        <?php $form = \yii\widgets\ActiveForm::begin([
            'action'=>['site/comment', 'id'=>$article->id],
            'options'=>['class'=>'form-horizontal contact-form', 'role'=>'form']])?>
            <div class="form-group">
                <div class="col-md-12">
                    <?= $form->field($commentForm, 'content')->textarea(['class'=>'form-control-c','placeholder'=>'Напишите сообщение...'])->label(false)?>
                </div>
            </div>
            <button type="submit" class="btn send-btn">Отправить</button>
        <?php \yii\widgets\ActiveForm::end();?>
 
    </div>
</div>
