<?php

namespace app\models\forms;

use app\models\User;
use Yii;
use yii\base\Model;

class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $password_confirm;

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            [['username', 'email', 'password', 'password_confirm'], 'required', 'message' => Yii::t('app/note', 'Fill in the field')],
            [['username', 'email', 'password', 'password_confirm'], 'string', 'max' => 50, 'tooLong' => Yii::t('app/note', 'The field must contain no more than {number} characters', ['number' => 50])],
            [['password', 'password_confirm'], 'string', 'min' => 6, 'tooShort' => Yii::t('app/note', 'The field must contain more than {number} characters', ['number' => 6])],
            [['email'], 'unique', 'targetClass' => User::className(), 'message' => Yii::t('app/note', 'This email is already registered')],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels(): array
    {
        return [
            'username' => Yii::t('app', 'Username'),
            'email' => Yii::t('app', 'Email'),
            'password' => Yii::t('app', 'Password'),
            'password_confirm' => Yii::t('app', 'Password confirm'),
        ];
    }

    public function register()
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
