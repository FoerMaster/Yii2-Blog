<?php

namespace app\modules\profile\controllers;

use yii\web\Controller;
use Yii;
use app\models\User;
use app\models\Articles;
use yii\web\NotFoundHttpException;

/**
 * Default controller for the `profile` module
 */
class DefaultController extends Controller
{

    public function actionIndex($id = 0)
    {
        $user = $this->findModel($id);
        $posts = Articles::find()->where('author = :id AND status = 1', [':id' => $user->id])->all();
        if (!empty(Yii::$app->user->identity->id) && $id == Yii::$app->user->identity->id){
            $posts = Articles::find()->where('author = :id', [':id' => $user->id])->all();
        }
        
        return $this->render('index', [
            'posts' => $posts,
            'user'=>$user
        ]);
    }


    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
