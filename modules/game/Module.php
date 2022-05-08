<?php

namespace app\modules\game;

use Yii;
use yii\web\ErrorHandler;

/**
 * Game module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\game\controllers';

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
                    'errorAction' => '/game/page/error',
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
        Yii::$app->i18n->translations['modules/game/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath' => '@app/modules/game/messages',
            'fileMap' => [
                'modules/game/app'    => 'app.php',
                'modules/game/note'   => 'note.php',
                'modules/game/error'  => 'error.php',
                'modules/game/log'    => 'log.php'
            ],
        ];
    }

    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('modules/game/' . $category, $message, $params, $language);
    }
}
