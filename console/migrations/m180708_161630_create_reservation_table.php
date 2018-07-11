<?php

use yii\db\Migration;

/**
 * Handles the creation of table `reservation`.
 */
class m180708_161630_create_reservation_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%reservation}}', [
            'id' => $this->primaryKey()->unsigned(),
            'user_id' => $this->integer(11)->unsigned()->notNull(),
            'realty_id' => $this->integer(11)->unsigned()->notNull(),
            'status' => $this->integer(11)->unsigned()->notNull(),
            'phone' => $this->string(255)->notNull(),
            'name' => $this->string(255)->notNull(),
            'email' => $this->string(255)->notNull(),
            'date_from' => $this->date()->notNull(),
            'date_to' => $this->date()->notNull(),
            'arrival_date' => $this->timestamp()->null(),
            'comment' => $this->text()->null(),
            'comment_admin' => $this->text()->null(),
        ]);

        $this->createIndex('user_id', '{{%reservation}}', 'user_id');
        $this->createIndex('realty_id', '{{%reservation}}', 'realty_id');
        $this->createIndex('status', '{{%reservation}}', 'status');
        $this->createIndex('start', '{{%reservation}}', 'start');
        $this->createIndex('stop', '{{%reservation}}', 'stop');

        $this->addForeignKey('fk_rs_realty_id', '{{%reservation}}', 'realty_id', '{{%realty}}', 'id', 'RESTRICT', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_rs_user_id', '{{%reservation}}');
        $this->dropForeignKey('fk_rs_realty_id', '{{%reservation}}');

        $this->dropTable('{{%reservation}}');
    }
}
