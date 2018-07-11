<?php

use yii\db\Migration;

/**
 * Class m180711_161126_update_reservation_table
 */
class m180711_161126_update_reservation_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%reservation}}', 'address_id', 'INT(11) UNSIGNED NOT NULL');
        $this->createIndex('address_id', '{{%reservation}}', 'address_id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_rs_address_id', '{{%reservation}}');
        $this->dropColumn('{{%reservation}}', 'address_id');
    }
}
