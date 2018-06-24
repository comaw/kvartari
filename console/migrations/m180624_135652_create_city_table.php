<?php

use yii\db\Migration;

/**
 * Handles the creation of table `city`.
 */
class m180624_135652_create_city_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%city}}', [
            'id' => $this->primaryKey(11)->unsigned(),
            'country_id' => $this->integer(11)->unsigned()->notNull(),
            'name' => $this->string(255)->notNull()->unique(),
            'position' => $this->integer(11)->notNull()->defaultValue(0),
            'created' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        $this->createIndex('country_id', '{{%city}}', 'country_id');
        $this->createIndex('position', '{{%city}}', 'position');
        $this->addForeignKey('country', '{{%city}}', 'country_id', '{{%country}}', 'id', 'RESTRICT', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('country', '{{%city}}');
        $this->dropTable('{{%city}}');
    }
}
