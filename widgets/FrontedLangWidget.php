<?php

namespace app\widgets;

use yii\base\Widget;

/**
 * Виджет для футера во фронте
 */
class FrontendLangWidget extends Widget
{
    /**
     * {@inheritdoc}
     */
    public function run()
    {
        return $this->render('fronted/lang');
    }
}
