<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $role
 * @property int $status_id
 * @property string|null $auth_key
 * @property string|null $access_token
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    const ROLE_GUEST = "?";
    const ROLE_AUTHORIZED = "@";

    const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'user';

    //Статусы пользователей
    const STATUS_ACTIVE = "Active";
    const STATUS_ACTIVE_ID = 1;

    const STATUS_TAG_TO_BAN = "Tag to ban";
    const STATUS_TAG_TO_BAN_ID = 2;

    const STATUS_BAN = "Ban";
    const STATUS_BAN_ID = 3;

    /**
     * @return string
     */
    public static function tableName()
    {
        return '{{%users}}';
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            [['username', 'email', 'password', 'role', 'status_id'], 'required'],
            [['status_id'], 'integer'],
            [['username', 'password'], 'string', 'max' => 255],
            [['role'], 'string', 'max' => 15],
            [['created_at', 'updated_at'], 'safe'],
            [['auth_key', 'access_token'], 'string', 'max' => 32],
            [['email'], 'unique'],
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
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
            'email' => Yii::t('app', 'Email'),
            'role' => Yii::t('app', 'Role'),
            'status_id' => Yii::t('app', 'Status'),
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
            'created_at' => Yii::t('app', 'Created at'),
            'updated_at' =>  Yii::t('app', 'Updated at'),
        ];
    }

    /**
     * Finds an identity by the given ID.
     *
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @return int current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return bool if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
}
