<?php

/* @var $this yii\web\View */
use yii\widgets\LinkPager;
$this->title = 'Foer Blog';
?>
<div class="site-index">
    <div class="body-content">

    <div class="row">
        <?php foreach($articles as $article):?>
        
            <div class="col-sm-4 col-md-4">
                <div class="thumbnail">
                    <div class="image-header" style="background-image: url(<?php echo $article->urlImage()?>);"></div>
                    <div class="caption">
                        <h3><?php echo $article->title?></h3>
                        <p style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><?php echo $article->content?></p>
                        <p><a href="/site/post?id=<?php echo $article->id?>" class="btn btn-primary" role="button">Читать полностью</a></p>
                    </div>
                </div>
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
