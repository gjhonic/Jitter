<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%stages}}`.
 */
class m220607_111013_create_stages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%stages}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'title' => $this->string(255)->notNull(),
            'description' => $this->text()->null(),
            'user_id' => $this->integer()->notNull(),
            'number' => $this->integer()->notNull(),
            'game_id' => $this->integer()->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);

        $this->createIndex('idx-stages-id', '{{%stages}}', 'id');

        $this->addForeignKey(
            'fk-stages-user_id',
            '{{%stages}}',
            'user_id',
            '{{%users}}',
            'id',
            'RESTRICT'
        );

        $this->addForeignKey(
            'fk-stages-game_id',
            '{{%stages}}',
            'game_id',
            '{{%games}}',
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
            'fk-stages-game_id',
            '{{%stages}}'
        );

        $this->dropForeignKey(
            'fk-stages-user_id',
            '{{%stages}}'
        );

        $this->dropIndex('idx-stages-id', '{{%stages}}');

        $this->dropTable('{{%stages}}');
    }
}
