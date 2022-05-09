<?php

namespace app\controllers;

use app\models\forms\LoginForm;
use app\models\forms\RegisterForm;
use app\models\User;
use yii\db\Exception;
use yii\helpers\Url;

class AuthController extends \yii\web\Controller
{
    public $layout = 'main';

    public function actionLogin()
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

    public function actionRegister()
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

    public function actionLogout()
    {
        if(\Yii::$app->user->identity) {
            \Yii::$app->user->logout();
            return $this->redirect(Url::to('login'));
        }else{
            return $this->redirect(Url::to('login'));
        }
    }

}
