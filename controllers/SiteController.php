<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\RegisterForm;

use yii\data\Pagination;
use app\models\Articles;
use app\models\CommentForm;
use app\models\User;
use app\models\ImageUpload;
use yii\web\UploadedFile;
use app\models\Comments;
use yii\web\NotFoundHttpException;
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $query = Articles::find();
        $pagination = new Pagination(['totalCount'=>$query->count(),'pageSize'=>8]);

        $articles = $query
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $query2 = Articles::find();
        $toparticle = $query2
            ->orderBy(['date' => SORT_DESC])
            ->one();
            
        return $this->render('index',[
            'articles'=>$articles,
            'pagination'=>$pagination,
            'toparticle'=>$toparticle]
        );
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionRegister()
    {
        $model = new RegisterForm();
 
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->register()) {
                if (Yii::$app->getUser()->login($user,3600*24*30)) {
                    return $this->goHome();
                }
            }
        }
 
        return $this->render('register', [
            'model' => $model,
        ]);
    }

    public function actionPost($id)
    {
        $article = Articles::find()->where('id = :id', [':id' => $id])->one();
        $commentForm = new CommentForm();


        $query = Comments::find();
        $pagination = new Pagination(['totalCount'=>$query->count(),'pageSize'=>5]);

        $comments = $query
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->where('article_id = :id', [':id' => $id])
            ->all();

        return $this->render('post',[
            'article'=>$article,
            'commentForm'=>$commentForm,
            'pagination'=>$pagination,
            'comments'=>$comments]
        );
    }

    public function actionAvatar()
    {
        $id = Yii::$app->user->identity->id;
        $model = new ImageUpload;
        if(Yii::$app->request->isPost){
            $usr = $this->findModel($id);
            $file = UploadedFile::getInstance($model,'image');

            if($usr->getImage()){
                unlink($usr->getImage());
            }

            if($usr->saveImage($model->uploadFile($file))){
                return $this->goHome();
            }
        }
        return $this->render('avatar',['model'=>$model]);
    }

    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionComment($id)
    {
        $model = new CommentForm();
        
        if(Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());
            if($model->saveComment($id))
            {
                return $this->redirect(['site/post','id'=>$id]);
            }
        }
    }
}
