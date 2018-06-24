<?php

use yii\db\Migration;

/**
 * Handles the creation of table `term`.
 */
class m180624_141358_create_term_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%term}}', [
            'id' => $this->primaryKey(11)->unsigned(),
            'name' => $this->string(255)->notNull()->unique(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%term}}');
    }
}
