<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%requests}}`.
 */
class m260622_132240_create_requests_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%requests}}', [
            'id' => $this->string(36),
            'request_name' => $this->string()->notNull(),
            'address' => $this->string()->notNull(),
            'status' => "ENUM('approved', 'pending', 'blocked', 'revoked') NOT NULL DEFAULT 'pending'",
        ]);


        $this->addPrimaryKey(
            'pk-requests',
            'requests',
            'id'
        );


    }



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%requests}}');
    }
}
