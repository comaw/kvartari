<?php

use yii\db\Migration;

/**
 * Handles the creation of table `image`.
 */
class m180624_150314_create_image_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%image}}', [
            'id' => $this->primaryKey(11)->unsigned(),
            'name' => $this->string(255)->notNull()->unique(),
            'realty_id' => $this->integer(11)->notNull()->unsigned(),
            'position' => $this->integer(11)->notNull()->defaultValue(0),
            'title' => $this->string(255)->null()->defaultValue(null),
            'created' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);
        $this->createIndex('realty_id', '{{%image}}', 'realty_id');
        $this->createIndex('position', '{{%image}}', 'position');

        $this->addForeignKey('realty_id', '{{%image}}', 'realty_id', '{{%realty}}', 'id', 'RESTRICT', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('realty_id', '{{%image}}');
        $this->dropTable('{{%image}}');
    }
}
