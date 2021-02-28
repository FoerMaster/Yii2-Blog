<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Авторизация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login white-theme" >
    <div class="row">
        <div class="col-lg-5 c-d">
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                    <?= $form->field($model, 'login')->textInput(['autofocus' => true]) ?>
                    <?= $form->field($model, 'password')->passwordInput() ?>
                    <?= $form->field($model, 'rememberMe')->checkbox() ?>
                    <div class="form-group">
                        <?= Html::submitButton('Войти', ['class' => 'button-prim', 'name' => 'register-button']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
