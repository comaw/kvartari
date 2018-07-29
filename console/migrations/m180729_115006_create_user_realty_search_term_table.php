<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_realty_search_term`.
 */
class m180729_115006_create_user_realty_search_term_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_realty_search_term}}', [
            'user_realty_id' => $this->integer(11)->unsigned(),
            'term_id' => $this->integer(11)->unsigned(),
        ]);

        $this->createIndex('user_realty_id', '{{%user_realty_search_term}}', 'user_realty_id');
        $this->createIndex('term_id', '{{%user_realty_search_term}}', 'term_id');
        $this->addPrimaryKey('realty_term', '{{%user_realty_search_term}}', ['user_realty_id', 'term_id']);

        $this->addForeignKey('fk_usrt_user_realty_id', '{{%user_realty_search_term}}', 'user_realty_id', '{{%user_realty_search}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_usrt_term_id', '{{%user_realty_search_term}}', 'term_id', '{{%term}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_usrt_user_realty_id', '{{%user_realty_search_term}}');
        $this->dropForeignKey('fk_usrt_term_id', '{{%user_realty_search_term}}');
        $this->dropTable('{{%user_realty_search_term}}');
    }
}
