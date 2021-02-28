<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ActiclesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ваши посты';
?>

<div class="site-index">
    <p><?= Html::a('Создать запись', ['create'], ['class' => 'button-prim']) ?></p>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => [
            'class' => 'table '
        ],
        'columns' => [
            [
                'format' => 'html',
                'label' => 'Автор',
                'value' => function($data){
                    return $data->getAuthorName();
                }
            ],
            'title',
            [
                'format' => 'html',
                'label' => 'Контент',
                'contentOptions'=>['style'=>'max-height: 80px;'],
                'value' => function($data){
                    return $data->content;
                }
            ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

<!--
<div class="articles-index" style='background-color: white;padding: 19px;'>

    <h1><?= Html::encode($this->title) ?></h1>

    <p><?= Html::a('Создать запись', ['create'], ['class' => 'btn btn-success']) ?></p>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'format' => 'html',
                'label' => 'Автор',
                'value' => function($data){
                    return $data->getAuthorName();
                }
            ],
            'title',
            [
                'format' => 'html',
                'label' => 'Контент',
                'contentOptions'=>['style'=>'max-height: 80px;'],
                'value' => function($data){
                    return $data->content;
                }
            ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
-->