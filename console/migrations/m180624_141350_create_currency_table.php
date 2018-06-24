<?php

use yii\db\Migration;

/**
 * Handles the creation of table `currency`.
 */
class m180624_141350_create_currency_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%currency}}', [
            'id' => $this->primaryKey(11)->unsigned(),
            'name' => $this->string(255)->notNull()->unique(),
            'position' => $this->integer(11)->notNull()->defaultValue(0),
        ]);

        $this->createIndex('position', '{{%currency}}', 'position');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%currency}}');
    }
}
