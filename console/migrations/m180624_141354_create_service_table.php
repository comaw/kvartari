<?php

use yii\db\Migration;

/**
 * Handles the creation of table `service`.
 */
class m180624_141354_create_service_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%service}}', [
            'id' => $this->primaryKey(11)->unsigned(),
            'name' => $this->string(255)->notNull()->unique(),
            'position' => $this->integer(11)->notNull()->defaultValue(0),
            'price' => $this->integer(11)->notNull()->defaultValue(0),
            'currency_id' => $this->integer(11)->unsigned()->notNull(),
        ]);

        $this->createIndex('position', '{{%service}}', 'position');
        $this->createIndex('currency_id', '{{%service}}', 'currency_id');

        $this->addForeignKey('currency', '{{%service}}', 'currency_id', '{{%currency}}', 'id', 'RESTRICT', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('currency', '{{%service}}');
        $this->dropTable('{{%service}}');
    }
}
