<?php

use yii\db\Migration;

/**
 * Handles the creation of table `realty_device_service`.
 */
class m180624_152547_create_realty_device_service_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%realty_device_service}}', [
            'realty_id' => $this->integer(11)->unsigned(),
            'device_service_id' => $this->integer(11)->unsigned(),
        ]);

        $this->createIndex('realty_id', '{{%realty_device_service}}', 'realty_id');
        $this->createIndex('device_service_id', '{{%realty_device_service}}', 'device_service_id');
        $this->addPrimaryKey('realty_device_service', '{{%realty_device_service}}', ['realty_id', 'device_service_id']);

        $this->addForeignKey('fk_rds_realty_id', '{{%realty_device_service}}', 'realty_id', '{{%realty}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_rds_device_service_id', '{{%realty_device_service}}', 'device_service_id', '{{%device_service}}', 'id', 'CASCADE', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_rds_realty_id', '{{%realty_device_service}}');
        $this->dropForeignKey('fk_rds_device_service_id', '{{%realty_device_service}}');
        $this->dropTable('{{%realty_device_service}}');
    }
}
