<?use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\widgets\LinkPager;
use yii\helpers\Url;
?>
<!--
<div class="profile-default-index">
    <a href='/site/avatar' class='button-prim' style="float: left;">Обновить аватар</a>
    <a href='/profile/articles' class='button-prim' style="float: left;">Открыть список постов</a>
    <form action="/site/logout" method="post">
        <input type="hidden" name="_csrf" value="<?//=Yii::$app->request->getCsrfToken()?>" />
        <p><input class='button-red' type="submit" value="Выйти"></p>
    </form>
</div>
-->
<div class="profile-card">
    <img src="<?= Yii::getAlias('@web').'/storage/'.$user->avatar ?>" >
    <div class="profile-meta">
        <p class="name"><?= $user->login?> <? if($user->is_admin){echo "<a>Админ</a>";}?> </p>
        <p class="date">Дата регистрации: <?= date("d.m.Y", $user->created_at)?></p>
        <p class="date">Постов: <?= count($posts)?></p>
        <? if($user->id == Yii::$app->user->identity->id) echo "<a href='/site/avatar' class='button-prim' style='float: left;'>Обновить аватар</a>"; ?>
        <? if($user->id == Yii::$app->user->identity->id) echo "<a href='/profile/articles' class='button-prim' style='float: left;'>Открыть список постов</a>"; ?>

        <? if($user->id == Yii::$app->user->identity->id) echo "<form action='/site/logout' style='float: left;' method='post'><input type='hidden' name='_csrf' value='".Yii::$app->request->getCsrfToken()."' /><p><input class='button-red' type='submit' value='Выйти'></p></form>"; ?>
    </div>
</div>

<hr class='c-hr'>

<div class="row">
<?php foreach($posts as $article):?>
            <a class="goto-post" href="<?= Url::to(['../post', 'id' => $article->id]);?>">
                <div class='post-card'>
                    <img src="<?= $article->urlImage() ?>" >
                    <div class="data">
                        <h4><?= Html::encode($article->title) ?></h4>
                        <h3><?= Html::encode($article->content)?></h3>
                    </div>
                    
                    <a href="<?= Url::to(['/profile', 'id' => $article->getAuthorModel()->id]);?>" class="meta">
                        <img src="<?= Yii::getAlias('@web').'/storage/'.$article->getAuthorModel()->avatar ?>" >
                        <p class="name"><?= $article->getAuthorModel()->login?></p>
                        <p class="date"><?= date("d.m.Y", strtotime($article->date))?></p>
                        
                    </a>
                    <? if($user->id == Yii::$app->user->identity->id) echo "<a href='".Url::to(["articles/view",'id' => $article->id])."' class='chernovik'><i class='fas fa-pen-nib'></i></a>"; ?>
                    <? if($user->id == Yii::$app->user->identity->id && $article->status == 0) echo "<a href='".Url::to(["articles/view",'id' => $article->id])."' class='inv'><i class='fas fa-eye-slash'></i></a>"; ?>
                </div>
            </a>
        <?php endforeach;?>
</div>