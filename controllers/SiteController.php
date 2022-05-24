<?php

namespace app\controllers;

use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\Controller;

class SiteController extends Controller
{
    public function behaviors(): array
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'denyCallback' => function () {
                    $this->redirect(Url::to(['/signin']));
                },
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'about', 'guide', 'confidentiality'],
                        'roles' => ['?', '@'],
                    ],
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

    public $layout = 'frontend';

    /**
     * Render homepage
     * @return string
     */
    public function actionIndex()
    {
       return $this->render('index');
    }

    /**
     * Render about
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Render about
     * @return string
     */
    public function actionGuide()
    {
        return $this->render('guide');
    }

    /**
     * Render about
     * @return string
     */
    public function actionConfidentiality()
    {
        return $this->render('confidentiality');
    }
}
