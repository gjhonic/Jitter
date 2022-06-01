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
            [['name', 'title'], 'required'],
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
            'user_id' => Yii::t('app', 'User id'),
            'created_at' => Yii::t('app', 'Created at'),
            'updated_at' => Yii::t('app', 'Updated at'),
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

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($insert) {
                $this->setAuthor();
            }
            return true;
        } else {
            return false;
        }
    }

    /**
     * Устанавливается создатель игры
     */
    public function setAuthor()
    {
        $this->user_id = Yii::$app->user->identity->id;
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
