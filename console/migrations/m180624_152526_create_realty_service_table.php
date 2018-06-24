<?php

use yii\db\Migration;

/**
 * Handles the creation of table `realty_service`.
 */
class m180624_152526_create_realty_service_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%realty_service}}', [
            'realty_id' => $this->integer(11)->unsigned(),
            'service_id' => $this->integer(11)->unsigned(),
        ]);

        $this->createIndex('realty_id', '{{%realty_service}}', 'realty_id');
        $this->createIndex('service_id', '{{%realty_service}}', 'service_id');
        $this->addPrimaryKey('realty_service', '{{%realty_service}}', ['realty_id', 'service_id']);

        $this->addForeignKey('fk_realty_id', '{{%realty_service}}', 'realty_id', '{{%realty}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_service_id', '{{%realty_service}}', 'service_id', '{{%service}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_realty_id', '{{%realty_service}}');
        $this->dropForeignKey('fk_service_id', '{{%realty_service}}');
        $this->dropTable('{{%realty_service}}');
    }
}
