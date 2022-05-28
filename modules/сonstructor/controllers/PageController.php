<?php
/**
 * PageController
 * Основной Контроллер модуля сonstructor
 * @copyright Copyright (c) 2022 Eugene Andreev
 * @author Eugene Andreev <gjhonic@gmail.com>
 *
 */
namespace app\modules\сonstructor\controllers;

use yii\filters\AccessControl;
use yii\helpers\Url;
use app\models\User;
use yii\web\Controller;

/**
 * Default controller for the `сonstructor` module
 */
class PageController extends Controller
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
                        'actions' => ['index'],
                        'roles' => [User::ROLE_USER],
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

    public $layout = 'сonstructor';

    /**
     * HomePage сonstructor
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
