<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%games}}`.
 */
class m220528_110707_create_games_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%games}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'title' => $this->string(255)->notNull(),
            'description' => $this->text()->null(),
            'user_id' => $this->integer()->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);

        $this->createIndex('idx-games-id', '{{%games}}', 'id');

        $this->addForeignKey(
            'fk-games-user_id',
            '{{%games}}',
            'user_id',
            '{{%users}}',
            'id',
            'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-games-user_id',
            '{{%games}}'
        );

        $this->dropIndex('idx-game-id', '{{%games}}');

        $this->dropTable('{{%games}}');
    }
}
