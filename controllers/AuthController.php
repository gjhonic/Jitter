<?php

namespace app\controllers;

use app\models\forms\LoginForm;
use app\models\forms\RegisterForm;
use app\models\User;
use yii\db\Exception;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Url;

class AuthController extends \yii\web\Controller
{
    public $layout = 'frontend';

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
                        'actions' => ['signin', 'signup'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['signout'],
                        'roles' => ['@'],
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

    public function actionSignin()
    {
        if(\Yii::$app->user->isGuest) {
            $model = new LoginForm();
            $data = \Yii::$app->request->post();
            if($model->load($data) && $model->validate()) {
                $identity = User::findOne(['email' => $data['LoginForm']['email']]);
                if($identity && \Yii::$app->getSecurity()->validatePassword($data['LoginForm']['password'], $identity['password'])) {
                    \Yii::$app->user->login($identity);
                    return $this->redirect('/');
                } else {
                    throw new Exception('Неверный логин или пароль.');
                }
            }else{
                return $this->render('login', [
                    'model' => $model,
                ]);
            }
        }else{
            return $this->redirect('/');
        }
    }

    public function actionSignup()
    {
        $model = new RegisterForm();
        $data = \Yii::$app->request->post();
        if($model->load($data) && $model->validate()) {
            $model->register($data['RegisterForm']);
            return $this->redirect(Url::to('login'));
        }else{
            return $this->render('register', [
                'model' => $model
            ]);
        }
    }

    public function actionSignout()
    {
        if(\Yii::$app->user->identity) {
            \Yii::$app->user->logout();
            return $this->redirect(Url::to('login'));
        }else{
            return $this->redirect(Url::to('login'));
        }
    }

}
