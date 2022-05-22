<?php

namespace app\widgets;

use yii\base\Widget;

/**
 * Виджет для смены языков во фронте
 */
class FrontendLangWidget extends Widget
{
    /**
     * {@inheritdoc}
     */
    public function run()
    {
        return $this->render('frontend/lang');
    }
}
