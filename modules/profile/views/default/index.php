<?php
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\widgets\LinkPager;
use yii\helpers\Url;
use app\components\postCard;
$this->title = $user->login;
?>

<div class="profile-card">
    <img src="<?= Yii::getAlias('@web').'/storage/'.$user->avatar ?>" >
    <div class="profile-meta">
        <p class="name"><?= $user->login?> <?php if($user->is_admin){echo "<a>Админ</a>";}?> </p>
        <p class="date">Дата регистрации: <?= date("d.m.Y", $user->created_at)?></p>
        <p class="date">Постов: <?= count($posts)?></p>
        <!-- Очень плохое решение, но иного исхода я не нашел :( -->
        <?php if(!empty(Yii::$app->user->identity->id) && $user->id == Yii::$app->user->identity->id) echo "<a href='/site/avatar' class='button-prim' style='float: left;'>Обновить аватар</a>"; ?>
        <?php if(!empty(Yii::$app->user->identity->id) && $user->id == Yii::$app->user->identity->id) echo "<a href='/profile/articles' class='button-prim' style='float: left;'>Открыть список постов</a>"; ?>
        <?php if(!empty(Yii::$app->user->identity->id) && $user->id == Yii::$app->user->identity->id) echo "<form action='/site/logout' style='float: left;' method='post'><input type='hidden' name='_csrf' value='".Yii::$app->request->getCsrfToken()."' /><p><input class='button-red' type='submit' value='Выйти'></p></form>"; ?>
    </div>
</div>

<hr class='c-hr'>

<div class="row">

    <?php foreach($posts as $article):?>
        <?= postCard::widget(['article' => $article]) ?>
    <?php endforeach;?>
</div>