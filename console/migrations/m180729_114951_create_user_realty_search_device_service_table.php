<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_realty_search_device_service`.
 */
class m180729_114951_create_user_realty_search_device_service_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_realty_search_device_service}}', [
            'user_realty_id' => $this->integer(11)->unsigned(),
            'device_service_id' => $this->integer(11)->unsigned(),
        ]);

        $this->createIndex('user_realty_id', '{{%user_realty_search_device_service}}', 'user_realty_id');
        $this->createIndex('device_service_id', '{{%user_realty_search_device_service}}', 'device_service_id');
        $this->addPrimaryKey('realty_device_service', '{{%user_realty_search_device_service}}', ['user_realty_id', 'device_service_id']);

        $this->addForeignKey('fk_usrds_user_realty_id', '{{%user_realty_search_device_service}}', 'user_realty_id', '{{%user_realty_search}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_usrds_device_service_id', '{{%user_realty_search_device_service}}', 'device_service_id', '{{%device_service}}', 'id', 'CASCADE', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_usrds_user_realty_id', '{{%user_realty_search_device_service}}');
        $this->dropForeignKey('fk_usrds_device_service_id', '{{%user_realty_search_device_service}}');
        $this->dropTable('{{%user_realty_search_device_service}}');
    }
}
