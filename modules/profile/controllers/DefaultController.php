<?php

namespace app\modules\profile\controllers;

use yii\web\Controller;
use Yii;

/**
 * Default controller for the `profile` module
 */
class DefaultController extends Controller
{

    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        return $this->render('index');
    }

}
