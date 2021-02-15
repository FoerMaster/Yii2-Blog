<?
use yii\helpers\Html;
use yii\helpers\Url;
unset($users[0]); //Ссори костыль, но лучшего варианта я не нашел :/
// getArticles($pagination,$sort = 1,$author = 0)
?>
<div class="row" style="position: relative;">
    <a id="t-filter" class="filter-button">
        <i class="fas fa-filter"></i>
    </a>
    <div id='filter' class='filter'>
        <p>Фильтр по дате</p>
        <a href="<?= Url::to(['/site/filter', 'author' => $filters['author'],'sort' => 1]);?>"><p class="filter-b">Сначала новые <i class="fas fa-sort-numeric-down-alt"></i></p></a>
        <a href="<?= Url::to(['/site/filter', 'author' => $filters['author'],'sort' => 0]);?>"><p class="filter-b">Сначала старые <i class="fas fa-sort-numeric-up"></i></p></a>
        <p>Фильтр по автору</p>
        <?php foreach($users as $user):?>
            <a href="<?= Url::to(['/site/filter', 'author' => $user->id,'sort' => $filters['sort']]);?>"><p class="filter-b"><?= $user->login ?></p></a>
        <?php endforeach;?>
    </div>
</div>
