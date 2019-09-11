<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%client_adress}}`.
 */
class m190911_072318_create_client_adress_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%client_adress}}', [
            'id' => $this->primaryKey(),
            'parent_id'=> $this->integer(11)->notNull(),
            'postcode'=> $this->string(32)->notNull(),
            'country'=> $this->string(4)->notNull(),
            'sity'=> $this->string(128)->notNull(),
            'street'=> $this->string(128)->notNull(),
            'building'=> $this->integer(11)->defaultValue(null),
            'office'=> $this->integer(11)->defaultValue(null)
        ]);


        $this->addForeignKey(
            'fk-client-adress',
            'client_adress',
            'parent_id',
            'client',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%client_adress}}');
    }
}
