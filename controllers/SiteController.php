<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Activity;
use app\models\ActivitySearch;

class SiteController extends Controller
{
    public function behaviors()
    {
        return 
        [
          'verbs' => 
          [
            'class'   => VerbFilter::className(),
            'actions' => 
            [
              'delete' => ['post'],
            ],
          ],

          'access' => 
          // User+ can create thread
          [
            'class' => AccessControl::className(),
            'only'  => ['index'],
            'rules' => 
            [
              [
                  'allow' => true,
                  'roles' => ['@'],
              ],
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

    public function actionIndex()
    {
        
        
        $model = new Activity();
        $model->user_id         = Yii::$app->user->identity->id; # Thread Starter is the currently logged in id.
        // Manually parses the current datetime
        $model->timestamp       = date("Y-m-d H:i:s");


        if ($model->load(Yii::$app->request->post()))
            {
                if(empty($model->type))
                {
                    $model->type = 'Clock-In';
                    Yii::$app->session->setFlash('user',Yii::t('user', 'Good Morning!'));
                }
                else
                {
                    Yii::$app->session->setFlash('user',Yii::t('user', 'Goodbye, Have a safe journey.'));
                }
                $model->save();
                
                return $this->redirect(['index']);

                
            }
        else {
            
            return $this->render('index', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

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

    public function actionAbout()
    {
        return $this->render('about');
    }
}
