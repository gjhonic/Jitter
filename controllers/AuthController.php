<?php

namespace app\controllers;

use app\models\forms\SigninForm;
use app\models\forms\SignupForm;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Url;

class AuthController extends \yii\web\Controller
{
    public function behaviors(): array
    {
        return [
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

    public $layout = 'frontend';

    public function actionSignin()
    {
        $model = new SigninForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $user = User::findOne(['email' => $model->email]);
            if ($user && Yii::$app->getSecurity()->validatePassword($model->password, $user->password)) {
                Yii::$app->user->login($user);
                return $this->redirect('/');
            } else {
                Yii::$app->session->setFlash('danger', Yii::t('app/note', ''));
            }
        }else{
            return $this->render('signin', [
                'model' => $model,
            ]);
        }
        
    }

    public function actionSignup()
    {
        $model = new SigninForm();
        $data = Yii::$app->request->post();
        if($model->load($data) && $model->validate()) {
            $model->register($data['RegisterForm']);
            return $this->redirect(Url::to('login'));
        }else{
            return $this->render('signup', [
                'model' => $model
            ]);
        }
    }

    public function actionSignout()
    {
        if(Yii::$app->user->identity) {
            Yii::$app->user->logout();
            return $this->redirect(Url::to('login'));
        }else{
            return $this->redirect(Url::to('login'));
        }
    }

}
