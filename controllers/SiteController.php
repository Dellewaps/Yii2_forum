<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\SignupForm;
use app\models\Category;
use app\models\Subcategory;
use app\models\User;
use yii\data\ActiveDataProvider;

class SiteController extends Controller
{

    /**
     * Displays homepage.
     * With all categorys
     * 
     */
    public function actionIndex()
    {        
        $category = new Category();
        
        $dataProvider = new ActiveDataProvider([
            'query' => $category->getCategory(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    /**
     * Displays signup page.
     * With form for signup
     * and post user input for signup.
     */
    public function actionSignup()
    {
        $model = new SignupForm();
 
        if ($model->load(Yii::$app->request->post())) {
            if ($model->signup()) {
                
                return $this->goHome();
            }
        }
 
        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionCategory($id)
    {
        $request = Yii::$app->request;
        var_dump($request);
        $Category = new Category();
        $Category->getCategorybyid($id);
        $dataProvider = new ActiveDataProvider([
            'query' => $Category->getCategorybyid($id),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $this->render(['category',
            'id' => $id,
            'dataProvider' => $dataProvider]);

    }

    public function actionSubcategory($id)
    {
        
        $Subcategory = new Subcategory();
        $Subcategory->getCategorybyid($id);
        $dataProvider = new ActiveDataProvider([
            'query' => $Subcategory->getSubcategory(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $this->render(['subcategory',
            'id' => $Subcategory,
            'dataProvider' => $dataProvider]);

    }
    

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
     * Login action.
     *
     * @return Response|string
     */
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

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
