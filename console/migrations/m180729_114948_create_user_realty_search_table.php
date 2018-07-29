<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_realty_search`.
 */
class m180729_114948_create_user_realty_search_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_realty_search}}', [
            'id' => $this->primaryKey(11)->unsigned(),
            'user_id' => $this->integer(11)->unsigned()->notNull(),
            'country_id' => $this->integer(11)->unsigned()->notNull(),
            'city_id' => $this->integer(11)->unsigned()->notNull(),
            'type_housing_id' => $this->integer(11)->unsigned()->notNull(),
            'places' => $this->integer(11)->null(),
            'footage' => $this->integer(11)->null(),
            'number_rooms' => $this->integer(11)->null(),
            'price_from' => $this->integer(11)->null(),
            'price_to' => $this->integer(11)->null(),
        ]);

        $this->createIndex('user_id', '{{%user_realty_search}}', 'user_id');
        $this->createIndex('country_id', '{{%user_realty_search}}', 'country_id');
        $this->createIndex('city_id', '{{%user_realty_search}}', 'city_id');
        $this->createIndex('type_housing_id', '{{%user_realty_search}}', 'type_housing_id');


        $this->addForeignKey('fk_urs_user_id', '{{%user_realty_search}}', 'user_id', '{{%user}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk_urs_country_id', '{{%user_realty_search}}', 'country_id', '{{%country}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk_urs_city_id', '{{%user_realty_search}}', 'city_id', '{{%city}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk_urs_type_housing_id', '{{%user_realty_search}}', 'type_housing_id', '{{%type_housing}}', 'id', 'RESTRICT', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_urs_user_id', '{{%user_realty_search}}');
        $this->dropForeignKey('fk_urs_country_id', '{{%user_realty_search}}');
        $this->dropForeignKey('fk_urs_city_id', '{{%user_realty_search}}');
        $this->dropForeignKey('fk_urs_type_housing_id', '{{%user_realty_search}}');

        $this->dropTable('{{%user_realty_search}}');
    }
}
