<?php

namespace app\models;

use Yii;
use app\models\User;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "games".
 *
 * @property int $id
 * @property string $name
 * @property string $title
 * @property string|null $description
 * @property int $user_id
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property User $user
 */
class Game extends \yii\db\ActiveRecord
{
    /**
     * @return string
     */
    public static function tableName(): string
    {
        return '{{%games}}';
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            [['name', 'title', 'user_id'], 'required'],
            [['description'], 'string'],
            [['user_id'], 'integer'],
            [[ 'created_at', 'updated_at'], 'safe'],
            [['name', 'title'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'user_id' => Yii::t('app', 'User ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
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
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
