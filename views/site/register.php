<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-register white-theme">
    <div class="row">
        <div class="col-lg-5 c-d">
 
            <?php $form = ActiveForm::begin(['id' => 'form-register']); ?>
                <?= $form->field($model, 'login')->textInput(['autofocus' => true]) ?>
                <?= $form->field($model, 'email') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <div class="form-group">
                    <?= Html::submitButton('Зарегистрироваться', ['class' => 'button-prim', 'name' => 'register-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
 
        </div>
    </div>
</div>

