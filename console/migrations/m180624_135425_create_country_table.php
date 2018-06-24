<?php

use yii\db\Migration;

/**
 * Handles the creation of table `country`.
 */
class m180624_135425_create_country_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%country}}', [
            'id' => $this->primaryKey(11)->unsigned(),
            'name' => $this->string(255)->notNull()->unique(),
            'code' => $this->string(10)->null()->unique(),
            'position' => $this->integer(11)->notNull()->defaultValue(0),
            'created' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        $this->createIndex('position', '{{%country}}', 'position');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%country}}');
    }
}
