<?php

use app\widgets\PostCard;
use yii\widgets\LinkPager;
use yii\helpers\Html;
$this->title = 'Foer Blog';
?>

<div class="site-index">
    <div class="row c-row">
        <a id="t-filter" class="filter-button">
            <i class="fas fa-filter"></i>
        </a>

        <div id='filter' class='filter'>

            <?= Html::a('<p class="filter-b">Сбросить фильтры <i class="fas fa-sync-alt"></i></p>', ['/', 'author' => 0,'sort' => 1]) ?>

            <?= Html::tag('p', "Фильтр по дате") ?>



            <?= Html::a('<p class="filter-b">Сначала новые <i class="fas fa-sort-numeric-down-alt"></i></p>', ['/', 'author' => $filters['author'],'sort' => 1]) ?>
            <?= Html::a('<p class="filter-b">Сначала старые <i class="fas fa-sort-numeric-up"></i></p>', ['/', 'author' => $filters['author'],'sort' => 0]) ?>
            <!-- Не очень рациональное решение, но делать отдельный виджет ради 2-ух кнопок, такое себе -->

            <?= Html::tag('p', "Фильтр по автору") ?>

            <?= Html::a('<p class="filter-b">Все</p>', ['/', 'author' => 0,'sort' => $filters['sort']]) ?>

            <?php foreach($users as $user):?>

                <?= Html::a('<p class="filter-b">'.$user->login.'</p>', ['/', 'author' => $user->id,'sort' => $filters['sort']]) ?>

            <?php endforeach;?>

        </div>
    </div>

    <div class="body-content animate__animated animate__fadeIn">

        <div class="row">

            <?php foreach($articles as $article):?>

                <?= PostCard::widget(['article' => $article]) ?>
            <?php endforeach;?>
        </div>
        <?= LinkPager::widget(['pagination' =>$pagination,]);?>
    </div>
</div>
