<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use franciscomaya\sceditor\SCEditor;
/* @var $this yii\web\View */
/* @var $model app\models\Articles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="articles-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->widget(SCEditor::className(), [
                    'options' => ['rows' => 40],
                    'clientOptions' => [
                        'plugins' => 'bbcode',
                    ]
                ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
