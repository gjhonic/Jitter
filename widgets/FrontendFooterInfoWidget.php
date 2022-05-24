<?php

namespace app\widgets;

use yii\base\Widget;

/**
 * Виджет по информации во фронте
 */
class FrontendFooterInfoWidget extends Widget
{
    /**
     * {@inheritdoc}
     */
    public function run()
    {
        return $this->render('frontend/footer/info');
    }
}
