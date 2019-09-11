<?php

use yii\db\Migration;

/**
 * Class m190911_063149_ctreate_client_table
 */
class m190911_063149_ctreate_client_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('client', [
            'id'=> $this->primaryKey(),
            'login'=> $this->string(255)->notNull()->unique(),
            'pass'=> $this->string(255)->notNull(),
            'firstname'=> $this->string(255)->notNull(),
            'lastname'=> $this->string(255)->notNull(),
            'sex'=> $this->tinyInteger(3)->defaultValue(null),
            'created_at'=>$this->dateTime()->notNull(),
            'email'=>$this->string(255)->notNull()->unique(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('client');
    }

}
