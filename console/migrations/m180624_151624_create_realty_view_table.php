<?php

use yii\db\Migration;

/**
 * Handles the creation of table `realty_view`.
 */
class m180624_151624_create_realty_view_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%realty_view}}', [
            'id' => $this->integer(11)->unsigned()->notNull()->unique(),
            'views' => $this->integer(11)->unsigned()->notNull()->defaultValue(0),
            'created' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated' => $this->integer(11)->notNull()->unsigned()->defaultValue(0),
        ]);

        $this->createIndex('updated', '{{%realty_view}}', 'updated');

        $this->addForeignKey('id', '{{%realty_view}}', 'id', '{{%realty}}', 'id', 'CASCADE', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('id', '{{%realty_view}}');
        $this->dropTable('{{%realty_view}}');
    }
}
