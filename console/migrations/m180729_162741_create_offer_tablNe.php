<?php

use yii\db\Migration;

/**
 * Class m180729_162741_create_offer_tablNe
 */
class m180729_162741_create_offer_tablNe extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%offer}}', [
            'id' => $this->primaryKey(11)->unsigned(),
            'owner_id' => $this->integer(11)->unsigned()->notNull(),
            'realty_id' => $this->integer(11)->unsigned()->notNull(),
            'user_id' => $this->integer(11)->unsigned()->notNull(),
            'created' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        $this->createIndex('owner_id', '{{%offer}}', 'owner_id');
        $this->createIndex('realty_id', '{{%offer}}', 'realty_id');
        $this->createIndex('user_id', '{{%offer}}', 'user_id');
        $this->createIndex('user_realty_owner', '{{%offer}}', ['user_id', 'realty_id', 'owner_id']);

        $this->addForeignKey('fk_offer_owner_id', '{{%offer}}', 'owner_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_offer_realty_id', '{{%offer}}', 'realty_id', '{{%realty}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_offer_user_id', '{{%offer}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_offer_owner_id', '{{%offer}}');
        $this->dropForeignKey('fk_offer_realty_id', '{{%offer}}');
        $this->dropForeignKey('fk_offer_user_id', '{{%offer}}');
        $this->dropTable('{{%offer}}');
    }
}
