<?
    use yii\helpers\Html;
?>
<div class="row c-row">
    <a id="t-filter" class="filter-button">
        <i class="fas fa-filter"></i>
    </a>

    <div id='filter' class='filter'>

        <?= Html::a('<p class="filter-b">Сбросить фильтры <i class="fas fa-sync-alt"></i></p>', ['/site/filter', 'author' => 0,'sort' => 1]) ?>

        <?= Html::tag('p', "Фильтр по дате") ?>



        <?= Html::a('<p class="filter-b">Сначала новые <i class="fas fa-sort-numeric-down-alt"></i></p>', ['/site/filter', 'author' => $filters['author'],'sort' => 1]) ?>
        <?= Html::a('<p class="filter-b">Сначала старые <i class="fas fa-sort-numeric-up"></i></p>', ['/site/filter', 'author' => $filters['author'],'sort' => 0]) ?>
        <!-- Не очень рациональное решение, но делать отдельный виджет ради 2-ух кнопок, такое себе -->

        <?= Html::tag('p', "Фильтр по автору") ?>

        <?= Html::a('<p class="filter-b">Все</p>', ['/site/filter', 'author' => 0,'sort' => $filters['sort']]) ?>

        <?php foreach($users as $user):?>

            <?= Html::a('<p class="filter-b">'.$user->login.'</p>', ['/site/filter', 'author' => $user->id,'sort' => $filters['sort']]) ?>

        <?php endforeach;?>

    </div>
</div>
