<?php

namespace app\modules\сonstructor;

use Yii;
use yii\web\ErrorHandler;

/**
 * Constructor module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\сonstructor\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        $this->registerTranslations();

        \Yii::configure($this, [
            'components' => [
                'errorHandler' => [
                    'class' => ErrorHandler::className(),
                    'errorAction' => '/сonstructor/page/error',
                ]
            ],
        ]);

        /** @var ErrorHandler $handler */
        $handler = $this->get('errorHandler');
        \Yii::$app->set('errorHandler', $handler);
        $handler->register();
    }

    public function registerTranslations()
    {
        Yii::$app->i18n->translations['modules/сonstructor/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath' => '@app/modules/сonstructor/messages',
            'fileMap' => [
                'modules/сonstructor/app' => 'app.php',
                'modules/сonstructor/note' => 'note.php',
                'modules/сonstructor/error' => 'error.php',
                'modules/сonstructor/log' => 'log.php'
            ],
        ];
    }

    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('modules/сonstructor/' . $category, $message, $params, $language);
    }
}
