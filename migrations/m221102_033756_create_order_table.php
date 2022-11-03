<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order}}`.
 */
class m221102_033756_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'product_id' => $this->integer(),
            'counts' => $this->integer(),
            'status' => $this->integer()->defaultValue(1),
            'warning' => $this->text(),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp()->defaultValue(null)
        ]);

        $this->addForeignKey(
            'user_id_order',
            'order',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'product_id_order',
            'order',
            'product_id',
            'product',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%order}}');
    }
}
