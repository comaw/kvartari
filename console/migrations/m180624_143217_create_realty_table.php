<?php

use yii\db\Migration;

/**
 * Handles the creation of table `realty`.
 */
class m180624_143217_create_realty_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%realty}}', [
            'id' => $this->primaryKey(11)->unsigned(),
            'url' => $this->string(255)->notNull()->unique(),
            'status_id' => $this->integer(11)->unsigned()->notNull(),
            'user_id' => $this->integer(11)->unsigned()->notNull(),
            'country_id' => $this->integer(11)->unsigned()->notNull(),
            'city_id' => $this->integer(11)->unsigned()->notNull(),
            'type_housing_id' => $this->integer(11)->unsigned()->notNull(),
            'street' => $this->string(255)->notNull(),
            'places' => $this->integer(11)->notNull(),
            'house' => $this->string(255)->null()->defaultValue(null),
            'housing' => $this->string(255)->null()->defaultValue(null),
            'apartment' => $this->string(255)->null()->defaultValue(null),
            'footage' => $this->integer(11)->notNull(),
            'number_rooms' => $this->integer(11)->notNull(),
            'pledge' => $this->integer(11)->null(),
            'price' => $this->integer(11)->notNull(),
            'created' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'title' => $this->string(255)->notNull(),
            'description' => $this->text()->notNull(),
            'laws' => $this->text()->null()->defaultValue(null),
            'longitude' => $this->decimal(11, 8)->null(),
            'latitude' => $this->decimal(11, 8)->null(),
        ]);

        $this->createIndex('status_id', '{{%realty}}', 'status_id');
        $this->createIndex('user_id', '{{%realty}}', 'user_id');
        $this->createIndex('country_id', '{{%realty}}', 'country_id');
        $this->createIndex('city_id', '{{%realty}}', 'city_id');
        $this->createIndex('type_housing_id', '{{%realty}}', 'type_housing_id');
        $this->createIndex('created', '{{%realty}}', 'created');
        $this->createIndex('updated', '{{%realty}}', 'updated');


        $this->addForeignKey('status_id', '{{%realty}}', 'status_id', '{{%status}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('user_id', '{{%realty}}', 'user_id', '{{%user}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('country_id', '{{%realty}}', 'country_id', '{{%country}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('city_id', '{{%realty}}', 'city_id', '{{%city}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('type_housing_id', '{{%realty}}', 'type_housing_id', '{{%type_housing}}', 'id', 'RESTRICT', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('status_id', '{{%realty}}');
        $this->dropForeignKey('user_id', '{{%realty}}');
        $this->dropForeignKey('country_id', '{{%realty}}');
        $this->dropForeignKey('city_id', '{{%realty}}');
        $this->dropForeignKey('type_housing_id', '{{%realty}}');
        $this->dropForeignKey('term_id', '{{%realty}}');
        $this->dropTable('{{%realty}}');
    }
}
