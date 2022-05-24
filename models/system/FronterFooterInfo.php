<?php

namespace app\models\system;

use Yii;

class FronterFooterInfo
{
    /**
     * Метод возвращает информацию в футере
     * @return array
     */
    public static function getData(): array
    {
        return [
            'index' => Yii::t('app', 'Home'),
            'guide' => Yii::t('app', 'How to play'),
            'about' => Yii::t('app', 'About'),
            'confidentiality' => Yii::t('app', 'Confidentiality'),
        ];
    }

}
