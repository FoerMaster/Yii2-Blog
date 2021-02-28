<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

?>

<div class="avatar-form white-theme">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'image')->widget(FileInput::classname(), ['options' => ['accept' => 'image/*'],]);?>

    <div class="form-group">
        <?= Html::submitButton('Загрузить', ['class' => 'button-prim']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>