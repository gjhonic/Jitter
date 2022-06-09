<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "stages".
 *
 * @property int $id
 * @property string $name
 * @property string $title
 * @property string|null $description
 * @property int $user_id
 * @property int $number
 * @property int $game_id
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Game $game
 * @property User $user
 */
class Stage extends \yii\db\ActiveRecord
{
    /**
     * @return string
     */
    public static function tableName(): string
    {
        return '{{%stages}}';
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            [['name', 'title', 'user_id', 'number', 'game_id'], 'required'],
            [['description'], 'string'],
            [['user_id', 'number', 'game_id'], 'default', 'value' => null],
            [['user_id', 'number', 'game_id'], 'integer'],
            [['name', 'title'], 'string', 'max' => 255],
            [['created_at', 'updated_at'], 'safe'],
            [['game_id'], 'exist', 'skipOnError' => true, 'targetClass' => Game::className(), 'targetAttribute' => ['game_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @return array
     */
    public function behaviors(): array
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'Id'),
            'name' => Yii::t('app', 'Name'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'user_id' => Yii::t('app', 'User'),
            'number' => Yii::t('app', 'Number'),
            'game_id' => Yii::t('app', 'Game'),
            'created_at' => Yii::t('app', 'Created at'),
            'updated_at' => Yii::t('app', 'Updated at'),
        ];
    }

    /**
     * Gets query for [[Game]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGame()
    {
        return $this->hasOne(Game::className(), ['id' => 'game_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
