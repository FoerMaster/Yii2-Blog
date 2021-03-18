<?php

use yii\widgets\LinkPager;
use app\components\postCard;
$this->title = 'Foer Blog';
?>

<div class="site-index">
    <?= $this->render('/parts/filter',['users' => $users ,'filters' => $filters]); ?> 
    <div class="body-content animate__animated animate__fadeIn">
    
        <div class="row">
            
            <?php foreach($articles as $article):?>
                
                <?= postCard::widget(['article' => $article]) ?>
            <?php endforeach;?>
        </div>
        <?= LinkPager::widget(['pagination' =>$pagination,]);?>
    </div>
</div>
