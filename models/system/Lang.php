<?php

namespace app\models\system;

use Yii;

class Lang
{
    const LANG_EN = 'en';
    const LANG_RU = 'ru';
    const LANG_KZ = 'kz';

    /**
     * Метод возвращает доступные языки
     * @return array
     */
    public static function getDataLangs(): array
    {
        return [
            self::LANG_EN => [
                'title' => Yii::t('app', 'English')
            ],
            self::LANG_RU => [
                'title' => Yii::t('app', 'Russion')
            ],
            self::LANG_KZ => [
                'title' => Yii::t('app', 'Kazak')
            ],
        ];
    }

    /**
     * Метод возвращает доступные языки
     * @return array
     */
    public static function getLangs(): array
    {
        return [
            self::LANG_EN,
            self::LANG_RU,
            self::LANG_KZ
        ];
    }
}
