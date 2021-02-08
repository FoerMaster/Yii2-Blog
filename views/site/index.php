<?php

/* @var $this yii\web\View */
use yii\widgets\LinkPager;
$this->title = 'Foer Blog';
?>
<div class="site-index">
    <div class="body-content">

    <div class="row">
        <?php foreach($articles as $article):?>
        <div class="col-lg-3">
        <?php if($article->getImage()){echo '<img src='.$article->urlImage().' class="card-img-top" width="200">';}?>
            <h2><?php echo $article->title?></h2>

            <p><?php echo $article->content?></p>
            
            <p><a class="btn btn-default" href="#">Читать дальше</a></p>
        </div>
        
        <?php endforeach;?>
    </div>
    <?php
    echo LinkPager::widget([
        'pagination' =>$pagination,
    ]);
    ?>
    </div>
</div>
