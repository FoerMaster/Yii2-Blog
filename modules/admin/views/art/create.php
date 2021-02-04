<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Art */

$this->title = 'Create Art';
$this->params['breadcrumbs'][] = ['label' => 'Arts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="art-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
