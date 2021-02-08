<?php

/* @var $this yii\web\View */
use yii\widgets\LinkPager;
$this->title = $article->title;
?>
<div class="site-index">
    <div class="body-content">
        <div class="col-lg-3">
        <?php if($article->getImage()){echo '<img src='.$article->urlImage().' class="card-img-top" width="400">';}?>
            <h1><?php echo $article->title?></h1>

            <p><?php echo $article->content?></p>
            
        </div>
    </div>
</div>
