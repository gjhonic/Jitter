<?php

namespace app\modules\constructor\models;

use app\models\Stage as StageGame;
use Yii;

/**
 *
 */
class Stage extends StageGame
{
    public static function find()
    {
        $user_id = Yii::$app->user->identity->id;
        return parent::find()->andWhere(['user_id' => $user_id]);
    }
}
