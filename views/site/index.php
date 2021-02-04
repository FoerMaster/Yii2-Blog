<?php

/* @var $this yii\web\View */

use yii\widgets\LinkPager;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <?php foreach($arts as $art):?>
            <div class="col-lg-3">
            <?php if($art->getImage()){echo '<img src='.$art->urlImage().' class="card-img-top" width="200">';}?>
                <h2><?php echo $art->title?></h2>

                <p><?php echo $art->desc?></p>
                
                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Читать дальше</a></p>
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
