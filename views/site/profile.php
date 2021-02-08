<?php

/* @var $this yii\web\View */

$this->title = Yii::$app->user->identity->login;
?>
<div class="site-index">

    <? var_dump(Yii::$app->user->identity); ?>
</div>
