<?php

use yii\db\Migration;

/**
 * Handles the creation of table `article`.
 */
class m180624_115217_create_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%article}}', [
            'id' => $this->primaryKey(11)->unsigned(),
            'active' => $this->tinyInteger(1)->notNull()->defaultValue(1),
            'name' => $this->string(255)->notNull(),
            'url' => $this->string(255)->unique()->notNull(),
            'title' => $this->string(255)->null(),
            'description' => $this->string(255)->null(),
            'text' => $this->text()->notNull(),
            'created' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        $this->createIndex('active', '{{%article}}', 'active');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%article}}');
    }
}
