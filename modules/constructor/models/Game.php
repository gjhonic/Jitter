<?php

namespace app\modules\constructor\models;

use app\models\Game as BaseGame;
use Yii;

/**
 * 
 */
class Game extends BaseGame
{
    public static function find()
    {
        $user_id = Yii::$app->user->identity->id;
        return parent::find()->andWhere(['user_id' => $user_id]);
    }
}
