<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_address`.
 */
class m180711_160303_create_user_address_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_address}}', [
            'id' => $this->primaryKey(11)->unsigned(),
            'user_id' => $this->integer(11)->unsigned()->notNull(),
            'type' => $this->integer(1)->unsigned()->notNull()->defaultValue(1),
            'fio' => $this->string(255)->notNull(),
            'date_birth' => $this->date()->notNull(),
            'place_birth' => $this->string(255)->notNull(),
            'passport_number' => $this->string(255)->notNull(),
            'information' => $this->string(4000)->null(),
        ]);

        $this->createIndex('user_id', '{{%user_address}}', 'user_id');
        $this->createIndex('type', '{{%user_address}}', 'type');

        $this->addForeignKey('fk_ua_user_id', '{{%user_address}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_ua_user_id', '{{%user_address}}');
        $this->dropTable('{{%user_address}}');
    }
}
