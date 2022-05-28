<?php

namespace app\modules\constructor;

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
    public $controllerNamespace = 'app\modules\constructor\controllers';

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
                    'errorAction' => '/constructor/page/error',
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
        Yii::$app->i18n->translations['modules/constructor/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath' => '@app/modules/constructor/messages',
            'fileMap' => [
                'modules/constructor/app' => 'app.php',
                'modules/constructor/note' => 'note.php',
                'modules/constructor/error' => 'error.php',
                'modules/constructor/log' => 'log.php'
            ],
        ];
    }

    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('modules/constructor/' . $category, $message, $params, $language);
    }
}
