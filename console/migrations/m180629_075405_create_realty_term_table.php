<?php

use yii\db\Migration;

/**
 * Handles the creation of table `realty_term`.
 */
class m180629_075405_create_realty_term_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%realty_term}}', [
            'realty_id' => $this->integer(11)->unsigned(),
            'term_id' => $this->integer(11)->unsigned(),
        ]);

        $this->createIndex('realty_id', '{{%realty_term}}', 'realty_id');
        $this->createIndex('term_id', '{{%realty_term}}', 'term_id');
        $this->addPrimaryKey('realty_term', '{{%realty_term}}', ['realty_id', 'term_id']);

        $this->addForeignKey('fk_rt_realty_id', '{{%realty_term}}', 'realty_id', '{{%realty}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_rt_term_id', '{{%realty_term}}', 'term_id', '{{%term}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_rt_realty_id', '{{%realty_term}}');
        $this->dropForeignKey('fk_rt_term_id', '{{%realty_term}}');
        $this->dropTable('{{%realty_term}}');
    }
}
