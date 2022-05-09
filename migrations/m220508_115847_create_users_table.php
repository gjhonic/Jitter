<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m220508_115847_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(255)->unique()->notNull(),
            'email' => $this->string()->unique(),
            'password' => $this->string(255)->notNull(),
            'role' => $this->string(15)->notNull(),
            'status_id' => $this->integer()->notNull(),
            'auth_key' => $this->string(32),
            'access_token' => $this->string(32),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
