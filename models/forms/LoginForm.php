<?php

namespace app\models\forms;

use Yii;
use yii\base\Model;

class LoginForm extends Model
{
    public $email;
    public $password;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'password'], 'required', 'message' => 'Заполните поле'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'email' => 'Email',
            'password' => 'Password',
        ];
    }
}
