<?php

namespace app\models\forms;

use app\models\User;
use Yii;
use yii\base\Model;
use yii\base\Security;
use yii\behaviors\TimestampBehavior;

class RegisterForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $password_confirm;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password', 'password_confirm'], 'required', 'message' => 'Заполните поле'],
            [['username', 'email', 'password', 'password_confirm'], 'string', 'max' => 50, 'tooLong' => 'Поле должно содержать не больше 50 символов'],
            [['password', 'password_confirm'], 'string', 'min' => 6, 'tooShort' => 'Поле должно содержать больше 6 символов'],
            [['email'], 'unique', 'targetClass' => User::className(), 'message' => 'Этот email уже зарегистрирован'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'password_confirm' => 'Password confirm',
        ];
    }

    public function register($data)
    {
        $user = new User();
        $user->role = User::ROLE_USER;
        $user->status_id = User::STATUS_ACTIVE_ID;
        $user->username = $this->username;
        $user->email = $this->email;
        $user->password = Yii::$app->security->generatePasswordHash($this->password);
        $user->save();
    }
}
