<?php

namespace app\models\system;

class Lang
{
    const LANG_EN = 'en';
    const LANG_RU = 'ru';
    const LANG_KZ = 'kz';

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
