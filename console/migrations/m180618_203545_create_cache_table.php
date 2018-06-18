<?php

use yii\db\Migration;

/**
 * Handles the creation of table `cache`.
 */
class m180618_203545_create_cache_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cache}}', [
            'id' => $this->char(128)->notNull(),
            'expire' => $this->integer(11)->unsigned()->notNull(),
            'data' => "LONGBLOB NULL",
        ]);

        $this->addPrimaryKey('id', '{{%cache}}', 'id');
        $this->createIndex('expire', '{{%cache}}', 'expire');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%cache}}');
    }
}
