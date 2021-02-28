<?php
    use app\components\postCard;
use yii\helpers\Html;

$this->title = $user->login;
?>

<div class="profile-card">
    <img src="<?= Yii::getAlias('@web').'/storage/'.$user->avatar ?>"  alt="">
    <div class="profile-meta">
        <p class="name"><?= $user->login?> <?php if($user->is_admin){echo "<a>Админ</a>";}?> </p>
        <p class="date">Дата регистрации: <?= date("d.m.Y", $user->created_at)?></p>
        <p class="date">Постов: <?= count($posts)?></p>
        <!-- Очень плохое решение, но иного исхода я не нашел :( -->
        <br>
        <div class="row">

            <?php if(!empty(Yii::$app->user->identity->id) && $user->id == Yii::$app->user->identity->id) echo Html::a('Обновить аватар', ['/site/avatar'],['class'=>'button-prim']); ?>
            <?php if(!empty(Yii::$app->user->identity->id) && $user->id == Yii::$app->user->identity->id) echo Html::a('Открыть список постов', ['/profile/articles'],['class'=>'button-prim']); ?>
            <?php if(!empty(Yii::$app->user->identity->id) && $user->id == Yii::$app->user->identity->id) echo "<form action='/site/logout' style='float: left;' method='post'><input type='hidden' name='_csrf' value='".Yii::$app->request->getCsrfToken()."' /><p><input class='button-red' type='submit' value='Выйти'></p></form>"; ?>
        </div>
    </div>
</div>

<hr class='c-hr'>

<div class="row">

    <?php foreach($posts as $article):?>
        <?= postCard::widget(['article' => $article]) ?>
    <?php endforeach;?>
</div>