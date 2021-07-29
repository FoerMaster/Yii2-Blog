<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use franciscomaya\sceditor\SCEditor;
?>

<div class="site-index from">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->widget(SCEditor::className(), [
                    'options' => ['rows' => 10,'format' => 'xhtml'],
                    'clientOptions' => [
                        'plugins' => 'xhtml',
                        'format' => 'xhtml',
                        'width'=> '100%',
                        'autoExpand' => true
                    ]
                ])?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'button-prim w-full']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
