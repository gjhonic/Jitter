<?php

use yii\db\Migration;
use \app\models\User;

/**
 * Class m220508_120620_rbac_date
 */
class m220508_120620_rbac_date extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        Yii::$app->runAction('migrate', [
            'migrationPath' => '@yii/rbac/migrations',
        ]);

        $auth = Yii::$app->authManager;
        $roleUser = $auth->createRole(User::ROLE_USER);
        $auth->add($roleUser);

        $auth = Yii::$app->authManager;
        $roleAdmin = $auth->createRole(User::ROLE_ADMIN);
        $auth->add($roleAdmin);
        $auth->addChild($roleAdmin, $roleUser);


        //Добавляем дефолтных пользователей
        $user = new User();
        $user->username = "test";
        $user->email = "test@mail.ru";
        $user->password = Yii::$app->getSecurity()->generatePasswordHash('12345678');
        $user->role = User::ROLE_USER;
        $user->status_id = User::STATUS_ACTIVE_ID;
        $user->save();

        $auth->assign($roleUser, $user->id);

        $admin = new User();
        $admin->username = "admin";
        $admin->email = "admin@mail.ru";
        $admin->password = Yii::$app->getSecurity()->generatePasswordHash('12345678');
        $admin->role = User::ROLE_ADMIN;
        $admin->status_id = User::STATUS_ACTIVE_ID;
        $admin->save();

        $auth->assign($roleAdmin, $admin->id);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220508_120620_rbac_date cannot be reverted.\n";

        return false;
    }
}
