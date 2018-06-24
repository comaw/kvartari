<?php

use yii\db\Migration;

/**
 * Handles the creation of table `type_housing`.
 */
class m180624_140344_create_type_housing_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%type_housing}}', [
            'id' => $this->primaryKey(11)->unsigned(),
            'name' => $this->string(255)->notNull()->unique(),
            'position' => $this->integer(11)->notNull()->defaultValue(0),
        ]);

        $this->createIndex('position', '{{%type_housing}}', 'position');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%type_housing}}');
    }
}
