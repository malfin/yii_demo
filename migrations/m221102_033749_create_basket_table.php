<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%basket}}`.
 */
class m221102_033749_create_basket_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%basket}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'product_id' => $this->integer(),
            'counts' => $this->integer(),
        ]);

        $this->addForeignKey(
            'user_id_basket',
            'basket',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'product_id_basket',
            'basket',
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
        $this->dropTable('{{%basket}}');
    }
}
