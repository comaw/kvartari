<?php

use yii\db\Migration;

/**
 * Handles the creation of table `device_service`.
 */
class m180624_140947_create_device_service_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%device_service}}', [
            'id' => $this->primaryKey(11)->unsigned(),
            'name' => $this->string(255)->notNull()->unique(),
            'position' => $this->integer(11)->notNull()->defaultValue(0),
        ]);

        $this->createIndex('position', '{{%device_service}}', 'position');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%device_service}}');
    }
}
