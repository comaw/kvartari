<?php

use yii\db\Migration;

/**
 * Handles the creation of table `reservation_addresses`.
 */
class m180711_185207_create_reservation_addresses_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%reservation_addresses}}', [
            'id' => $this->primaryKey(),
            'reservation_id' => $this->integer(11)->unsigned()->notNull(),
            'fio' => $this->string(255)->notNull(),
            'date_birth' => $this->date()->notNull(),
            'place_birth' => $this->string(255)->notNull(),
            'passport_number' => $this->string(255)->notNull(),
            'information' => $this->string(4000)->null(),
        ]);

        $this->createIndex('reservation_id', '{{%reservation_addresses}}', 'reservation_id');

        $this->addForeignKey('fk_ra_reservation_id', '{{%reservation_addresses}}', 'reservation_id', '{{%reservation}}', 'id', 'CASCADE', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_ra_reservation_id', '{{%reservation_addresses}}');
        $this->dropTable('{{%reservation_addresses}}');
    }
}
