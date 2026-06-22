<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%customers}}`.
 */
class m260622_132240_create_customers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%customers}}', [
            'id' => $this->string(36),
            'customer_name' => $this->string()->notNull(),
            'address' => $this->string()->notNull(),
            'status' => "ENUM('approved', 'pending', 'blocked', 'revoked') NOT NULL DEFAULT 'pending'",
        ]);


        $this->addPrimaryKey(
            'pk-customers',
            'customers',
            'id'
        );

        
    }



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%customers}}');
    }
}
