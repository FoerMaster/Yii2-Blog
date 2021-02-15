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
use yii\web\BadRequestHttpException;
class SiteController extends Controller
{
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

    /* ////////////////////// ACTIONS /////////////////////// */

    public function actionLogin()
    {
        $this->checkGuest();

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

        $this->checkGuest();

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

    public function actionIndex()
    {
        $query = Articles::find();
        $pagination = new Pagination(['totalCount'=>$query->count(),'pageSize'=>9]);

        $articles = $this->getArticles($pagination);
        $toparticle = $this->getLastArticle();
        $users = User::find()->all();
            
        return $this->render('index',[
            'articles'=>$articles,
            'users' => $users,
            'pagination'=>$pagination,
            'toparticle'=>$toparticle]
        );
    }

    public function actionPost($id)
    {
        $article = $this->getArticle($id);
        $commentForm = new CommentForm();
        $query = $article->getComments();
        $pagination = new Pagination(['totalCount'=>$query->count(),'pageSize'=>6]);

        $comments = $query
            ->offset($pagination->offset)
            ->limit($pagination->limit)
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
            $usr = $this->getUser($id);
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

    /* ////////////////////// SEARCH / FILTER /////////////////////// */

    public function actionFilter($sort = 1,$author = 0)
    {
        $query = Articles::find();
        $pagination = new Pagination(['totalCount'=>$query->count(),'pageSize'=>9]);
        $users = User::find()->all();
        $articles = $this->getArticles($pagination,$sort,$author);
        $filters = [
            'sort' => $sort,
            'author' => $author
        ];
        return $this->render('index',[
            'articles'=>$articles,
            'users' => $users,
            'pagination'=>$pagination,
            'filters'=>$filters]
        );
    }
    /* ////////////////////// HELP /////////////////////// */

    public function getUser($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function isGuest()
    {
        return Yii::$app->user->isGuest;
    }
    
    public function checkGuest()
    {
        if (!$this->isGuest()) {
            return $this->goHome();
        }
    }

    public function getArticles($pagination,$sort = 1,$author = 0)
    {
        $sorting = SORT_DESC;
        if($sort == 1){
            $sorting = SORT_DESC;
        } else {
            $sorting = SORT_ASC;
        }

        $query = Articles::find();
        $pagination = new Pagination(['totalCount'=>$query->count(),'pageSize'=>9]);

        if($author != 0){
            return $query->orderBy([ 'date' => $sorting ])->offset($pagination->offset)->limit($pagination->limit)->where(['author' => intval($author),'status' => 1])->all();
        }else{
            return $query->orderBy([ 'date' => $sorting ])->offset($pagination->offset)->limit($pagination->limit)->where('status = :status', [':status' => 1])->all(); 
        }

        
    }

    public function getLastArticle()
    {
        $query_toparticle = Articles::find();
        return $query_toparticle
            ->orderBy(['date' => SORT_DESC])
            ->where('status = :status', [':status' => 1])
            ->one();
    }

    public function getArticle($id)
    {
        return Articles::find()->where('id = :id', [':id' => $id])->one();
    }

}
