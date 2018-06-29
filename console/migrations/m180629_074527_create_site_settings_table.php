<?php

use yii\db\Migration;

/**
 * Handles the creation of table `site_settings`.
 */
class m180629_074527_create_site_settings_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%site_settings}}', [
            'name' => $this->string(255)->notNull(),
            'value' => $this->text()->null(),
            'title' => $this->string(255)->null(),
        ]);

        $this->addPrimaryKey('name', '{{%site_settings}}', 'name');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%site_settings}}');
    }
}
