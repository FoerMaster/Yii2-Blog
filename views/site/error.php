<?php
    use yii\helpers\Html;
    $this->title = $name;
?>
<div class="site-error white-theme">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= nl2br(Html::encode($message)) ?>
</div>
