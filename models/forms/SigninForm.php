<?php

namespace app\models\forms;

use Yii;
use yii\base\Model;

class SigninForm extends Model
{
    public $email;
    public $password;
    public $rememberMe = true;

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            [['email', 'password'], 'required', 'message' => Yii::t('app/note', 'Fill in the field')],
            ['rememberMe', 'boolean'],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels(): array
    {
        return [
            'email' => Yii::t('app', 'Email'),
            'password' => Yii::t('app', 'Password'),
            'rememberMe' => Yii::t('app', 'Remember me'),
        ];
    }
}
