<?php

namespace app\modules\admin;

use Yii;
use yii\web\ErrorHandler;

/**
 * Admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

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
                    'errorAction' => '/admin/page/error',
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
        Yii::$app->i18n->translations['modules/admin/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath' => '@app/modules/admin/messages',
            'fileMap' => [
                'modules/admin/app' => 'app.php',
                'modules/admin/note' => 'note.php',
                'modules/admin/error' => 'error.php',
                'modules/admin/log' => 'log.php'
            ],
        ];
    }

    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('modules/admin/' . $category, $message, $params, $language);
    }
}
